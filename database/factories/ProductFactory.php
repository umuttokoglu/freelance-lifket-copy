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
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'image' => $this->faker->imageUrl(),
            'title' => $this->faker->words(3, true),
            'description_tr' => $this->faker->paragraph,
            'description_en' => $this->faker->paragraph,
        ];
    }
}
