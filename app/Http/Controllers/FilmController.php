<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $filmCount = Film::count();
        return view('admin.dashboard', compact('filmCount'));
    }
    public function allfilm()
    {
        $films = Film::all();
        return view('admin.adminDash', compact('films'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'filmName' => 'required',
        ]);

        Film::create([
            'name' => $request->filmName,
        ]);
        
        return redirect()->route('admin.allFilm');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'filmName' => 'required',
        ]);

        $film = Film::findOrFail($id);
        $film->update([
            'filmName' => $request->filmName,
        ]);

        return redirect()->route('film.allfilm');
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return redirect()->route('film.allfilm');
    }
}

