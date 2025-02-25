<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        // Eğer veritabanında kategori yoksa, Category::factory()->create() ile de oluşturabilirsiniz.
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'title'       => $this->faker->words(3, true),
            'description' => $this->faker->paragraph,
        ];
    }
}
