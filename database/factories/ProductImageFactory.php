<?php

namespace Database\Factories;

use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    public function definition(): array
    {
        return [
            // Ürün mevcut değilse, Product::factory() ile de yeni bir ürün oluşturabilirsiniz.
            'product_id' => Product::inRandomOrder()->first()->id,
            'image_url'  => $this->faker->imageUrl(640, 480, 'technics', true),
            'caption'    => $this->faker->sentence,
            'sort_order' => $this->faker->numberBetween(0, 10),
        ];
    }
}
