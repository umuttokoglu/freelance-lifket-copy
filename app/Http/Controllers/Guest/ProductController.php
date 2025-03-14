<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSimilar;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $subCategoryId = request()->get('sub_category');

        $category = Category::find($subCategoryId);

        $products = Product::query()
            ->where('category_id', $subCategoryId)
            ->get();

        return view('guest.products', compact('category', 'products'));
    }

    public function show(Product $urunler): View
    {
        $product = $urunler->with('images')->first();

        $similarProducts = ProductSimilar::query()
            ->join('products', 'products.id', '=', 'product_similar.similar_id')
            ->where('product_similar.product_id', $product->id)
            ->get();

        return view('guest.product', compact('product', 'similarProducts'));
    }
}
