<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'original_amount' => 'decimal:2',
        'actual_amount' => 'decimal:2',
        'processing_fee' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function receipt(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attribute) => ($value ? '/uploads/transaction/' . $value : null)
        );
    }
}
