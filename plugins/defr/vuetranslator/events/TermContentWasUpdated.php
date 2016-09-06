<?php namespace DEfr\VueTranslator\Events;

use Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TermContentWasUpdated extends Event implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $termMessage;
    public $user;

    public function __construct($termMessage, $user)
    {
        $this->termMessage = $termMessage;
        $this->user = $user;
    }

    public function broadcastOn()
    {
        return [
            "bro-tty.1"
        ];
    }
}
