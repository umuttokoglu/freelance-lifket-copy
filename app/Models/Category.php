<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'parent_id',
        'title_tr',
        'title_en',
        'image',
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

    // Üst kategori (parent)
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Alt kategoriler (children)
    public function children(): HasMany|Category
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Recursive olarak tüm alt kategorileri çekmek için
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    // İlgili ürünler (alt kategorilere ait ürünler)
    public function products(): HasMany|Category
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    // Kategori oluşturucusu (User)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
