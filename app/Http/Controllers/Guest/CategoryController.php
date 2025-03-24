<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Category $hizmetler): View
    {
        $subCategories = Category::query()
            ->where('parent_id', $hizmetler->id)
            ->get();

        return view('guest.sub_category', compact('hizmetler', 'subCategories'));
    }
}
