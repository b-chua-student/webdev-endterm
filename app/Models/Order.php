<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false; 

    protected $fillable = [
        'user_id', 
        'email', 
        'shipped_to', 
        'status', 
        'total_price', 
        'ordered_at' => 'datetime',
    ];

    protected $casts = [
        'ordered_at' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}