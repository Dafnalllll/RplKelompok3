<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders'; // <--- ubah nama tabel di sini

    protected $fillable = [
        'order_code',
        'user_id',
        'product_id',
        'qty',
        'tanggal_order',
        'total_harga',
        'metode_bayar',
        'status',
        'payment_proof'
    ];

    // Relasi ke OrderUser berdasarkan order_code
    public function userOrders()
    {
        return $this->hasMany(OrderUser::class, 'order_code', 'order_code');
    }
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
}
