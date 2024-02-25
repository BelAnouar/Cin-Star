<?php

namespace App\Http\Controllers;

use App\Models\Acteur;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function fetchApiMovie()
    {
        $response = Http::get('https://gist.githubusercontent.com/saniyusuf/406b843afdfb9c6a86e25753fe2761f4/raw/523c324c7fcc36efab8224f9ebb7556c09b69a14/Film.JSON');
        $movies = json_decode($response->body());
        foreach ($movies as $movieData) {
            $movie = new Movie();
            $movie->title = $movieData->Title;
            $movie->duration = $movieData->Runtime;
            $movie->description = $movieData->Plot;
            $movie->release_date = $movieData->Released;
            $movie->Genre = $movieData->Genre;



            $actors = explode(', ', $movieData->Actors);
            foreach ($actors as $actorName) {
                $actor = Acteur::firstOrCreate(['name' => $actorName]);

                $movie->actor()->associate($actor);
                $movie->save();
            }
        }
    }
}
