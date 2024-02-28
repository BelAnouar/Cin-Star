<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'year',
        'duration',
        'release_date',
        'Awards',
        'genre',
        'actors',
        'Poster',
        'type',
        'description',
    ];

    public function actor()
    {
        return $this->belongsTo(Acteur::class, 'acteur_Id', 'id');
    }
}