<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->with('similarProducts.firstImage')
            ->oldest('sort_order')
            ->paginate(15);

        return view('guest.categories', compact('products'));
    }

    public function show(string $locale, Category $hizmetler): View
    {
        $subCategories = Category::query()
            ->where('parent_id', $hizmetler->id)
            ->oldest('sort_order')
            ->get();

        return view('guest.sub_category', compact('hizmetler', 'subCategories'));
    }
}
