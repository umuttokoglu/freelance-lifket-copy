<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSimilarProductRequest;
use App\Models\Product;
use App\Models\ProductSimilar;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SimilarProductController extends Controller
{
    public function edit(Product $similarProduct): View
    {
        $product = $similarProduct;

        $similarProducts = ProductSimilar::query()
            ->join('products', 'products.id', '=', 'product_similar.similar_id')
            ->where('product_id', '=', $product->id)
            ->get();

        $products = Product::query()
            ->where('id', '!=', $product->id)
            ->leftJoin('product_similar', 'product_similar.similar_id', '=', 'products.id')
            ->whereNull('product_similar.similar_id')
            ->latest()
            ->get();

        return view('admin.similar_product.edit', compact('product', 'products', 'similarProducts'));
    }

    public function update(UpdateSimilarProductRequest $request, Product $similarProduct): RedirectResponse
    {
        ProductSimilar::query()
            ->create([
                'product_id' => $similarProduct->id,
                'similar_id' => $request->validated('similar_id'),
            ]);

        return response()->redirectToRoute('admin.similar-products.edit', ['similar_product' => $similarProduct]);
    }

    public function destroy(Product $similarProduct): RedirectResponse
    {
        ProductSimilar::query()
            ->where('product_id', '=', request()->get('product_id'))
            ->where('similar_id', '=', $similarProduct->id)
            ->delete();

        return response()->redirectToRoute('admin.similar-products.edit', ['similar_product' => request()->get('product_id')]);
    }
}
