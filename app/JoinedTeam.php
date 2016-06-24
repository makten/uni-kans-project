<?php
/**
 * Created by PhpStorm.
 * User: Hafiz
 * Date: 6/20/2016
 * Time: 12:26 PM
 */

namespace app;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Auth\Authenticatable;

class JoinedTeam
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
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  App\Team $team
     *
     * @return void
     */
    public function __construct(Authenticatable $user, Team $team)
    {
        $this->user = $user;
        $this->team = $team;
    }
}