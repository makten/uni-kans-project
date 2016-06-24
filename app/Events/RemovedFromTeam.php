<?php

namespace App\Events;

use App\Events\Event;
use App\Team;
use Illuminate\Auth\Authenticatable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RemovedFromTeam extends Event
{
    use SerializesModels;

    /**
     * The user instance.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $user;
    /**
     * The team instance.
     *
     * @var \App\Team
     */
    public $team;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Authenticatable $user, Team $team)
    {
        $this->user = $user;
        $this->team = $team;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
