<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'user_id' => 1,
            'parent_id'   => null, // Ana kategori için null, alt kategori oluştururken state ile düzenlenebilir
            'title'       => Str::title($this->faker->words(2, true)),
            'image'       => $this->faker->imageUrl(640, 480, 'cats'),
            'description_tr' => $this->faker->realText(),
            'description_en' => $this->faker->realText(),
        ];
    }
}
