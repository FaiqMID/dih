<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'cardholder_name',
        'card_number',
        'expiration_date',
        'cvv',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
