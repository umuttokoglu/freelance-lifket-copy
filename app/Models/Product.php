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
    public function similarProducts()
    {
        return $this->belongsToMany(Product::class, 'product_similar', 'product_id', 'similar_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function features(): HasMany
    {
        return $this->hasMany(ProductFeature::class);
    }

    // Ürünün kaydedilmiş ilk görselini almak için ilişki
    public function firstImage()
    {
        // Laravel 8 ve sonrası için oldestOfMany kullanabilirsiniz,
        // veya klasik yöntemle orderBy kullanarak da yazabilirsiniz:
        return $this->hasOne(ProductImage::class)->oldestOfMany();
        // Alternatif:
        // return $this->hasOne(ProductImage::class)->orderBy('created_at', 'asc');
    }
}
