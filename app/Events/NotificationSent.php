<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotificationSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message = "";
    public $type = "";

    public function __construct($message, $type)
    {
        $this->message = $message;
        $this->type = $type;
    }
    
    public function broadcastWith()
    {
        // This must always be an array. Since it will be parsed with json_encode()
        return [
            'type' => $this->type,
            'message' => $this->message,
        ];
    }

    public function broadcastAs()
    {
        return 'NotificationSent';
    }

    public function broadcastOn()
    {
        return new Channel('public_notifications');
    }
}
