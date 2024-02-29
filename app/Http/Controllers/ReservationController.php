<?php

namespace App\Http\Controllers;

use App\Events\ReservaeChair;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function reserve(Request $request, $id)
    {
        event(new ReservaeChair($id, 1, $request->checkSeat));
    }
}
