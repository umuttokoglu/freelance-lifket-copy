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
        'title_tr',
        'title_en',
        'description_tr',
        'description_en',
    ];

    public function getTitleAttribute(): ?string
    {
        $locale = app()->getLocale();                                   // "tr" or "en"
        $key    = "title_{$locale}";                                    // "title_tr" or "title_en"

        // if that column exists and not null, return it
        if (! empty($this->attributes[$key] ?? null)) {
            return $this->attributes[$key];
        }

        // otherwise try fallback locale
        $fallback = config('app.fallback_locale');
        $fallbackKey = "title_{$fallback}";
        return $this->attributes[$fallbackKey] ?? null;
    }

    public function getDescriptionAttribute(): ?string
    {
        $locale = app()->getLocale();                                   // "tr" or "en"
        $key    = "description_{$locale}";                                    // "title_tr" or "title_en"

        // if that column exists and not null, return it
        if (! empty($this->attributes[$key] ?? null)) {
            return $this->attributes[$key];
        }

        // otherwise try fallback locale
        $fallback = config('app.fallback_locale');
        $fallbackKey = "description_{$fallback}";
        return $this->attributes[$fallbackKey] ?? null;
    }

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
        return $this->hasOne(ProductImage::class)->oldestOfMany();
    }
}
