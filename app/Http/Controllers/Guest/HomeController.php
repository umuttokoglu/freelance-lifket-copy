<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        // İlgili kategori bulunur, bulunamazsa 404 döner
        $category = Category::findOrFail(6);

        // Eager loading ile ilişkili ürünlerin görsellerini de çekiyoruz
        $products = $category->products()->with('images')->get();

        //dd($category, $products);

        return view('guest.home');
    }
}
