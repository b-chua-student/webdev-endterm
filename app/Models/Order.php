<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use HasFactory, Searchable;

    const UPDATED_AT = null; // disable Laravel's auto updated_at
    const CREATED_AT = null; // disable Laravel's auto updated_at

    protected $fillable = [
        'user_id',
        'email',
        'shipped_to',
        'status',
        'total_price',
        'ordered_at',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
        'ordered_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toSearchableArray()
    {
        return [
            'user_id'    => $this->user_id,
            'email'      => $this->email,
            'shipped_to' => $this->shipped_to,
            'status'     => $this->status,
            'total_price'=> $this->total_price,
            'ordered_at' => $this->ordered_at,
        ];
    }
}
