<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['image'];


    public function getImageAttribute()
    {
        return asset('images/ranking/0' . $this->id . '.png');
    }
}
