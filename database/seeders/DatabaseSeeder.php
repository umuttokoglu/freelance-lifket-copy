<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'MVA Makine',
            'email' => 'admin@deltavinc.com',
            'password' => Hash::make('deltavinc.com'),
        ]);

        $mainCategories = Category::factory(5)->create();

        $mainCategories->each(function ($category) {
            $subCategories = Category::factory(2)->create([
                'parent_id' => $category->id
            ]);

            $subCategories->each(function ($subCategory) {
                $products = Product::factory(3)->create([
                    'category_id' => $subCategory->id
                ]);

                $products->each(function ($product) {
                    ProductImage::factory(2)->create([
                        'product_id' => $product->id
                    ]);
                });
            });
        });
    }
}
