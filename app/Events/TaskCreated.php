<?php

namespace App\Events;

use App\Task;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Broadcast;


class TaskCreated extends Event implements ShouldBroadcast
{
    use SerializesModels, InteractsWithSockets;

    public $task;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
//        $this->dontBroadcastToCurrentUser();
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        // return ['private-teams.'.$this->task->team_id.'.tasks'];
       return ['teams.'.$this->task->team_id.'.tasks'];
    }
}
