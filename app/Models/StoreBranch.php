<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreBranch extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'manager_id',
    ];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
