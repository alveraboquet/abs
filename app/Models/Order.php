<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [

        'amount' => 'decimal:4',
        'float_amount' => 'decimal:4',
        'total_percentage' => 'decimal:4',
        'total_profit' => 'decimal:4',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
