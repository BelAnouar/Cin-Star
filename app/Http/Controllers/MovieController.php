<?php

namespace App\Http\Controllers;

use App\Models\Acteur;
use App\Models\Movie;
use App\Models\SalleDeCinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function fetchApiMovie()
    {
        $response = Http::get('https://gist.githubusercontent.com/saniyusuf/406b843afdfb9c6a86e25753fe2761f4/raw/523c324c7fcc36efab8224f9ebb7556c09b69a14/Film.JSON');
        $movies = json_decode($response->body());

        foreach ($movies as $movieData) {
            $movie = new Movie([
                'image' => $movieData->Images[0],
                'title' => $movieData->Title,
                'duration' => $movieData->Runtime,
                'description' => $movieData->Plot,
                'release_date' => $movieData->Released,
                'Genre' => $movieData->Genre,
                'salleId' => SalleDeCinema::inRandomOrder()->first()->id
            ]);

            $movie->save();

            $actors = explode(', ', $movieData->Actors);

            foreach ($actors as $actorName) {
                $actor = Acteur::firstOrCreate(['name' => $actorName]);
                $movie->actors()->attach($actor->id);
            }
        }
    }

    public function show($id)
    {
        $movie = Movie::with('salle', "salle.zones", "salle.zones.seats")->find($id);

        return view("single_page_film", ["movie" => $movie]);
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
