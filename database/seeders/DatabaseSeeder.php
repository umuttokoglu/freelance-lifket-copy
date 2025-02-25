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
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 5 ana kategori oluşturuyoruz
        $mainCategories = Category::factory(5)->create();

        $mainCategories->each(function($category) {
            // Her ana kategori için 2 alt kategori oluşturuyoruz
            $subCategories = Category::factory(2)->create([
                'parent_id' => $category->id
            ]);

            $subCategories->each(function($subCategory) {
                // Her alt kategori için 3 ürün oluşturuyoruz
                $products = Product::factory(3)->create([
                    'category_id' => $subCategory->id
                ]);

                $products->each(function($product) {
                    // Her ürün için 2 adet ürün görseli oluşturuyoruz
                    ProductImage::factory(2)->create([
                        'product_id' => $product->id
                    ]);
                });
            });
        });

        User::create([
            'name'     => 'Delta Vinç',
            'email'    => 'admin@deltavinc.com',
            'password' => Hash::make('deltavinc.com'), // Güçlü bir şifre belirleyin
        ]);
    }
}
