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

    public function displayMovies(){
        $movies = Movie::all();
        return view('welcome', compact('movies'));
    }
    public function show()
    {
        $movie = Movie::with('salle', "salle.zones", "salle.zones.seats")->find(1);

        return view("single_page_film", ["movie" => $movie]);
    }
    public function search(Request $request)
    {
        $searchData = $request->input('search');
        $filmsSearch = Movie::where('title', 'like', '%' . $searchData . '%')->get();
                    // ->orWhereHas('genre', function ($query) use ($searchData) {
                    //     $query->where('name', 'like', '%' . $searchData . '%');
                    // })
                    // ->orWhereHas('actors', function ($query) use ($searchData) {
                    //     $query->where('name', 'like', '%' . $searchData . '%');
                    // })
                    // ->orWhereHas('salle', function ($query) use ($searchData) {
                    //     $query->where('name', 'like', '%' . $searchData . '%');
                    // })
                   
                    // dd($filmsSearch);

         return view('welcome', compact('filmsSearch'));
        // dd($filmsSearch);
      
    }
}