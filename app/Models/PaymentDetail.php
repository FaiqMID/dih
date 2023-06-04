<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'account_number',
        'bank_name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
