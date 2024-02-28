<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title',
        'description',
        'Genre',
        'duration',
        'release_date',
        'salleId',
    ];

   public function actors()
    {
        return $this->belongsToMany(Acteur::class);
    }
    public function salle()
    {
        return $this->belongsTo(SalleDeCinema::class, 'salleId');
    }
}
