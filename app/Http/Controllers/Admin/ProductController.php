<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
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
        $filePath = $request->file('image')->store('/product', 'root_public');

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $filePath;

        Product::query()->create($data);

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
}
