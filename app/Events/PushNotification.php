<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PushNotification implements ShouldBroadCast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name;
    public $msg;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($name, $msg)
    {
        $this->name = $name;
        $this->msg = $msg;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('ncu-channel');
    }
}
