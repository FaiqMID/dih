<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'product_category_id',
        'store_branch_id',
    ];

    // public function productable(): MorphTo
    // {
    //     return $this->morphTo(__FUNCTION__, "");
    // }
    
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function storeBranch()
    {
        return $this->belongsTo(StoreBranch::class);
    }

    public function orderItem(){
        return $this->hasOne(OrderItem::class);
    }
}
