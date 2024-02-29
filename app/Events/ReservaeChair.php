<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReservaeChair
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $salle_id;
    public $user_id;
    public $checkSeat;
    /**
     * Create a new event instance.
     */
    public function __construct($salle_id, $user_id, $checkSeat)
    {
        $this->salle_id = $salle_id;
        $this->user_id = $user_id;
        $this->checkSeat = $checkSeat;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
