<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    protected $fillable = [
        'product_id',
        'feature_tr',
        'feature_en'
    ];

    public function getFeatureAttribute(): ?string
    {
        $locale = app()->getLocale();                                   // "tr" or "en"
        $key    = "feature_{$locale}";                                    // "title_tr" or "title_en"

        // if that column exists and not null, return it
        if (! empty($this->attributes[$key] ?? null)) {
            return $this->attributes[$key];
        }

        // otherwise try fallback locale
        $fallback = config('app.fallback_locale');
        $fallbackKey = "feature_{$fallback}";
        return $this->attributes[$fallbackKey] ?? null;
    }
}
