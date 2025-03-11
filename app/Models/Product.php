<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'image',
        'title',
        'description_tr',
        'description_en',
    ];

    // Ürünün ait olduğu kategori
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Benzer ürünler ilişkisi (kendine referanslı many-to-many)
    public function similarProducts(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_similar',
            'product_id',
            'similar_id'
        );
    }
}
