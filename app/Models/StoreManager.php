<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreManager extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_branch_id',
        'manager_id',
    ];

    public function branch()
    {
        return $this->belongsTo(StoreBranch::class, 'store_branch_id');
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
}
