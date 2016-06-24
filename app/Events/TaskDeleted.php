<?php

namespace App\Events;

use App\Task;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\InteractsWithSockets;


class TaskDeleted extends Event implements ShouldBroadcast
{
    use SerializesModels, InteractsWithSockets;

    public $teamId;
    public $taskId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($teamId, $taskId)
    {
        $this->teamId = $teamId;
        $this->taskId = $taskId;

        $this->dontBroadcastToCurrentUser();
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['private-teams.'.$this->teamId.'.tasks'];
    }
}
