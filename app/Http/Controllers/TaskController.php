<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\User;
use App\Team;
use App\UserProfile;

use App\Http\Requests;

class TaskController extends Controller
{
    /**
     * Show the task detail screen.
     *
     * @param  Request  $request
     * @param  Team  $team
     * @param  Task  $task
     * @return Response
     */
    public function show(Request $request, Team $team, Task $task)
    {
        abort_unless($request->user()->onTeam($team), 403);
        abort_unless($team->id === $task->team->id, 403);

        $userSettings = UserProfile::find($request->user()->id);

        return view('admin.task.show', ['task' => $task->load('creator'), 'userSettings' => $userSettings]);
    }
}
