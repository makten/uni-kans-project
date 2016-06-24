<?php

namespace App\Providers;

use App\Task;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::route(['middleware' => ['web']]);

        /**
         * Authenticate the team task list channel.
         */
        Broadcast::auth('teams.*.tasks', function ($user, $teamId) {
            
            return ! is_null($user->teams->find($teamId));
            
        });

        /**
         * Authenticate the task channel.
         */
        Broadcast::auth('task.*', function ($user, $taskId) {
                     
            $task = Task::find($taskId);            

           if ($task && $user->onTeam($task->team)) {
               return ['id' => $user->id, 'name' => $user->name_first, 'photo_url' => $user->userprofile->avatar_thumbnail];
           }
            
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
