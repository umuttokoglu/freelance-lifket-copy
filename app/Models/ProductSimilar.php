<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductSimilar extends Pivot
{
    protected $table = 'product_similar';

    protected $fillable = [
        'product_id',
        'similar_id'
    ];

    public $timestamps = false;
}
