<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'order_detail_id',
        'quantity',
        'price',
        'discount_amount',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
