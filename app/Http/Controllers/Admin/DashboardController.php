<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $categoryCount = Category::query()->count();
        $productCount = Product::query()->count();
        $messageCount = Contact::query()->count();

        return view('admin.dashboard', compact('categoryCount', 'productCount', 'messageCount'));
    }
}
