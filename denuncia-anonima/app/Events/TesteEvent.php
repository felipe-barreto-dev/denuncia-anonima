<?php

namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class TesteEvent implements ShouldBroadcast
{
    public function broadcastOn()
    {
        return new Channel('test-channel');
    }
}

// Dispare o evento no controlador

