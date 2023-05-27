<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow; // STEP 3
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessage implements ShouldBroadcastNow // STEP 4
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat; // STEP 6

    /**
     * Create a new event instance.
     */
    public function __construct($chat) // STEP 5
    {
        //
        $this->chat = ['username' => $chat['username'], 'avatar' => $chat['avatar'], 'textvalue' => $chat['textvalue']];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chatchannel'), //STEP 7
        ];
    }
}
