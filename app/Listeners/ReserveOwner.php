<?php

namespace App\Listeners;

use App\Events\ReservaeChair;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class ReserveOwner
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ReservaeChair $event): void
    {
        dd($event->checkSeat);
    }
}
