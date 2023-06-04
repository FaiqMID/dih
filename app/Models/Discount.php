<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'discount_name',
        'discount_description',
        'discount_amount',
        'start_date',
        'end_date',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
