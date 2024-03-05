<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class statistics extends Controller
{
    public function statistic(){
        $MostBookedMovies = Film::select('movies.title', DB::raw('COUNT(reservations.id) AS bookings_count'))
             ->leftJoin('reservations', 'movies.id', '=', 'reservations.film_id')
             ->groupBy('films.id')
             ->orderByDesc('bookings_count')
             ->limit(3)
             ->get();
             return view('admin.adminDash', compact('MostBookedMovies'));
             
             $UserCount = User::count('users');
             $ReservationCount = Reservation::count('Reseration');
     }
}