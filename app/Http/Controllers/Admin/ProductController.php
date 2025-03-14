<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->withCount('images')
            ->with(['category'])
            ->latest()
            ->paginate(10);

        return view('admin.product.index', compact('products'));
    }

    public function create(): View|RedirectResponse
    {
        $subCategories = Category::query()
            ->whereNotNull('parent_id')
            ->latest()
            ->get();

        if ($subCategories->isEmpty()) {
            session()->flash('error', 'İlk önce alt kategori eklemelisiniz. Lütfen alt kategori ekledikten sonra tekrar deneyiniz.');

            return response()->redirectToRoute('admin.products.index');
        }

        return view('admin.product.create', compact('subCategories'));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;

        $product = Product::query()->create($data);

        // Geçici görseller listesi varsa, JSON'dan diziye çeviriyoruz.
        $tempImages = $request->temporary_images ? json_decode($request->temporary_images, true) : [];

        foreach ($tempImages as $tempFile) {
            $destinationPath = 'products/' . $product->id;
            $fileName = basename($tempFile);

            // Önce temp dosyasının varlığını kontrol edelim (kaynak disk: 'public')
            if (!Storage::disk('public')->exists($tempFile)) {
                \Log::error("Temp dosya bulunamadı: " . $tempFile);
                continue;
            }

            // Hedef dizin ('root_public' diski, yani public dizini) yoksa oluştur
            if (!Storage::disk('root_public')->exists($destinationPath)) {
                Storage::disk('root_public')->makeDirectory($destinationPath);
            }

            // Dosyayı kaynak diskten okuyup, hedef diske yazalım.
            try {
                $fileContents = Storage::disk('public')->get($tempFile);
                $written = Storage::disk('root_public')->put($destinationPath . '/' . $fileName, $fileContents);
                if ($written) {
                    // Dosya hedefe başarılı bir şekilde yazıldıysa, kaynak dosyayı silelim.
                    Storage::disk('public')->delete($tempFile);
                } else {
                    \Log::error("Dosya yazılamadı: " . $tempFile . " -> " . $destinationPath . '/' . $fileName);
                    continue;
                }
            } catch (\Exception $e) {
                \Log::error("Taşıma sırasında hata: " . $e->getMessage());
                continue;
            }

            // Ürün resmi kaydı oluşturuyoruz.
            ProductImage::create([
                'product_id' => $product->id,
                'path' => $destinationPath . '/' . $fileName,
            ]);
        }

        session()->flash('message', 'Ürün başarıyla eklendi.');

        return response()->redirectToRoute('admin.products.index');
    }

    public function edit(Product $product)
    {
        $subCategories = Category::query()
            ->whereNotNull('parent_id')
            ->latest()
            ->get();

        return view('admin.product.edit', compact('product', 'subCategories'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        // Yeni asenkron olarak yüklenen görselleri işleyelim.
        $tempImages = $request->temporary_images ? json_decode($request->temporary_images, true) : [];

        foreach ($tempImages as $tempFile) {
            $destinationPath = 'products/' . $product->id;
            $fileName = basename($tempFile);

            // Kaynak (temp) dosyanın varlığını kontrol edelim.
            if (!Storage::disk('public')->exists($tempFile)) {
                \Log::error("Temp dosya bulunamadı: " . $tempFile);
                continue;
            }

            // Hedef dizin (public dizini – "root_public" diskimiz) yoksa oluştur.
            if (!Storage::disk('root_public')->exists($destinationPath)) {
                Storage::disk('root_public')->makeDirectory($destinationPath);
            }

            try {
                // Dosya içeriğini okuyup hedefe yazıyoruz.
                $fileContents = Storage::disk('public')->get($tempFile);
                $written = Storage::disk('root_public')->put($destinationPath . '/' . $fileName, $fileContents);
                if ($written) {
                    Storage::disk('public')->delete($tempFile);
                } else {
                    \Log::error("Dosya yazılamadı: " . $tempFile . " -> " . $destinationPath . '/' . $fileName);
                    continue;
                }
            } catch (\Exception $e) {
                \Log::error("Taşıma sırasında hata: " . $e->getMessage());
                continue;
            }

            // Ürün resmi kaydı oluştur.
            ProductImage::create([
                'product_id' => $product->id,
                'path' => $destinationPath . '/' . $fileName,
            ]);
        }

        $product->update($data);

        session()->flash('message', 'Ürün başarıyla güncellendi.');

        return response()->redirectToRoute('admin.products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $images = $product->images->toArray();

        $isDeleted = $product->delete();

        if (!$isDeleted) {
            session()->flash('message', 'Ürün silinirken bir sorun oluştu!');

            return response()->redirectToRoute('admin.products.index');
        }

        foreach ($images as $image) {
            if (Storage::disk('root_public')->exists($image['path'])) {
                Storage::disk('root_public')->delete($image['path']);
                Storage::disk('root_public')->deleteDirectory('products/' . $image['product_id']);
            }
        }

        session()->flash('message', 'Ürün başarıyla silindi.');

        return response()->redirectToRoute('admin.products.index');
    }

    public function images($id)
    {
        // İlgili ürünün görsellerini yükle (eager loading kullanarak)
        $product = Product::with('images')->findOrFail($id);

        // Her resim için 'path' değerini full URL haline getiriyoruz
        $images = $product->images->pluck('path')->map(function ($path) {
            return asset($path);
        });

        return response()->json(['images' => $images]);
    }

    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);
        // Dosya "root_public" diskinde saklanıyorsa silme işlemi:
        if (Storage::disk('root_public')->exists($image->path)) {
            Storage::disk('root_public')->delete($image->path);
        }
        $image->delete();

        return response()->json(['success' => true]);
    }
}
