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
        $response = Http::get('https://gist.githubusercontent.com/saniyusuf/406b843afdfb9c6a86e25753fe2761f4/raw/523c324c7fcc36efab8224f9ebb7556c09b69a14/movie.JSON');
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
   
    public function index()
    {
        $movieCount = Movie::count();
        return view('admin.dashboard', compact('movieCount'));
    }
    public function allmovie()
    {
        $movies = Movie::all();
        return view('admin.adminDash', compact('movies'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'movieName' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $posterPath = $request->file('poster')->store('posters', 'public');
    
        Movie::create([
            'title' => $request->movieName,
            'poster' => $posterPath,
        ]);
    
        return redirect()->route('admin.allMovie');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'movieName' => 'required',
            'poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $movie = Movie::findOrFail($id);
    
        if ($request->hasFile('poster')) {
            // Delete the old poster
            Storage::disk('public')->delete($movie->poster);
    
            // Upload the new poster
            $posterPath = $request->file('poster')->store('posters', 'public');
        } else {
            $posterPath = $movie->poster;
        }
    
        $movie->update([
            'title' => $request->movieName,
            'poster' => $posterPath,
        ]);
    
        return redirect()->route('movie.allMovie');
    }
    public function destroy($id)
{
    $movie = Movie::findOrFail($id);

    // Delete the associated poster file
    Storage::disk('public')->delete($movie->poster);

    // Delete the movie record
    $movie->delete();

    return redirect()->back();
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
}