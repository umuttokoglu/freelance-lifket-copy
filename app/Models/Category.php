<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'parent_id',
        'title',
        'image',
        'description_tr',
        'description_en',
    ];

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
