<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;


    public function salleDeCinema()
    {
        return $this->belongsTo(SalleDeCinema::class);
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
