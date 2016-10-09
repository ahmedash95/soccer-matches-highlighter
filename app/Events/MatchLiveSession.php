<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MatchLiveSession implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $data;
    private $channelName;

    public function __construct(\App\Match $match,$data)
    {
        $this->channelName = 'match-'.$match->id;
        $this->data = $data;
    }

    public function broadcastOn()
    {
        return [$this->channelName];
    }
}
