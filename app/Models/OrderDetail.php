<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_address_id',
        'user_payment_id',
        'subtotal',
        'discount_amount',
        'tax',
        'total',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function userAddress()
    {
        return $this->belongsTo(UserAddress::class);
    }

    public function userPayment()
    {
        return $this->belongsTo(UserPayment::class);
    }
}
