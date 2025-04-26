<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(string $locale, Category $urun): View
    {
        $subCategories = Category::query()
            ->where('parent_id', $urun->id)
            ->oldest('sort_order')
            ->get();

        $hizmetler = $urun;

        return view('guest.sub_category', compact('hizmetler', 'subCategories'));
    }
}
