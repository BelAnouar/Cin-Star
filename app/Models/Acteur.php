<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'acteur_Id'];
    public function movies()
    {
        return $this->hasMany(Movie::class, 'acteur_Id', 'id');
    }
}
