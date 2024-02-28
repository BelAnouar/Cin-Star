<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalleDeCinema extends Model
{
    use HasFactory;


    protected $fillable = [
        'salle_name',
        'number_seats',
    ];

    public function zones()
    {
        return $this->hasMany(Zone::class);
    }

    public function movie()
    {
        $this->hasOne(Movie::class, "salleId");
    }
}
