<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct($message)
    {
        // \Log::info('Test: ' . $this->message);
        $this->message = $message;
    }

    // public function broadcastOn()
    // {
    //     return new Channel('chat');
    // }


    public function broadcastOn()
    {
        return new Channel('eggker');
    }
  
    public function broadcastAs()
    {
        return 'MessageSent';
    }
}
