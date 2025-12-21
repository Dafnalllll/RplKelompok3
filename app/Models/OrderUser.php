<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderUser extends Model
{
    protected $table = 'user_orders';

    protected $fillable = [
        'order_code',
        'product_id',
        'user_id',
        'start_date',
        'end_date',
        'total_price',
        'status',
        'payment',
        'detail',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke produk
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Relasi ke Order berdasarkan order_code
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_code', 'order_code');
    }
}
