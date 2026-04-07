<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'url_large',
        'url_medium',
        'url_thumb',
        'sort_order',
    ];

    /**
     * Relationship: An image belongs to a specific product.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}