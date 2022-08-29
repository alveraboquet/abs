<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attribute) => ($value ? '/uploads/announcements/' . $value : null)
        );
    }
}
