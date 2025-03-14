<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $categories = Category::query()
            ->whereNull('parent_id')
            ->latest()
            ->limit(6)
            ->get();

        return view('guest.home', compact('categories'));
    }
}
