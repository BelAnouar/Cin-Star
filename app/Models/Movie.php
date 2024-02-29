<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','image', 'description', 'genre', 'duration', 'realease_date',
    ];

    public function actor()
    {
        return $this->belongsTo(Acteur::class, 'acteur_Id', 'id');
    }
}