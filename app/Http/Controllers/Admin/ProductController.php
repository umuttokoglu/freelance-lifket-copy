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

        foreach($tempImages as $tempFile) {
            $destinationPath = 'products/' . $product->id;
            $fileName = basename($tempFile);

            // Önce temp dosyasının varlığını kontrol edelim (kaynak disk: 'public')
            if(!Storage::disk('public')->exists($tempFile)){
                \Log::error("Temp dosya bulunamadı: " . $tempFile);
                continue;
            }

            // Hedef dizin ('root_public' diski, yani public dizini) yoksa oluştur
            if(!Storage::disk('root_public')->exists($destinationPath)){
                Storage::disk('root_public')->makeDirectory($destinationPath);
            }

            // Dosyayı kaynak diskten okuyup, hedef diske yazalım.
            try {
                $fileContents = Storage::disk('public')->get($tempFile);
                $written = Storage::disk('root_public')->put($destinationPath . '/' . $fileName, $fileContents);
                if($written){
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

        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('/category', 'root_public');
            $data['image'] = $filePath;
        }

        $data['user_id'] = auth()->user()->id;

        $product->update($data);

        session()->flash('message', 'Ürün başarıyla güncellendi.');

        return response()->redirectToRoute('admin.products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $image = $product->image;
        $isDeleted = $product->delete();

        if (!$isDeleted) {
            session()->flash('message', 'Ürün silinirken bir sorun oluştu!');

            return response()->redirectToRoute('admin.products.index');
        }

        unlink(public_path($image));

        session()->flash('message', 'Ürün başarıyla silindi.');

        return response()->redirectToRoute('admin.products.index');
    }

    public function images($id)
    {
        // İlgili ürünün görsellerini yükle (eager loading kullanarak)
        $product = Product::with('images')->findOrFail($id);

        // Her resim için 'path' değerini full URL haline getiriyoruz
        $images = $product->images->pluck('path')->map(function($path){
            return asset($path);
        });

        return response()->json(['images' => $images]);
    }
}
