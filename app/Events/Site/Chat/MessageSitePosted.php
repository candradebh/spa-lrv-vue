<?php

namespace App\Events\Site\Chat;

use App\Models\Site\Chat\SiteMessage;
use App\Models\Site\Visitor;
use App\Models\User;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSitePosted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Message
     *
     * @var Message
     */
    public $message;

    /**
     * User
     *
     * @var User
     */
    public $visitor;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(SiteMessage $message, Visitor $visitor)
    {
        $this->message = $message;
        $this->visitor = $visitor;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('sitechatroom');
    }
}
