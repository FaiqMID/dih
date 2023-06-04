<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'search';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'product_category_id',
        'store_branch_id',
    ];
    
    use HasFactory;
}
