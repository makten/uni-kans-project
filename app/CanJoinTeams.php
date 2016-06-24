<?php
/**
 * Created by PhpStorm.
 * User: Hafiz
 * Date: 6/20/2016
 * Time: 12:19 PM
 */

namespace app;

use app\StartApp;
use App\Team;
use App\Invitation;

trait CanJoinTeams
{
    /**
     * Determine if the user is a member of any teams.
     *
     * @return bool
     */
    public function hasTeams()
    {
        return count($this->teams) > 0;
    }

    public function onTeam($team)
    {
        if (is_null($team->whereUserId($this->id))) {
            return false;
        }
        return true;

    }

//    public function ownsTeam($team)
//    {
//        if (is_null($team->owner_id) || is_null($this->id)) {
//            return false;
//        }
//        return $this->id === $team->owner_id;
//    }

    /**
     * Get all of the teams that the user belongs to.
     */
    public function teams()
    {
        return $this->belongsToMany(
            StartApp::model('teams', Team::class), 'user_teams', 'user_id', 'team_id'
        )->withPivot(['role'])->orderBy('team_name', 'asc');
    }

    /**
     * Get all of the teams that the user owns.
     */
    public function ownedTeams()
    {
        return $this->teams()->where("owner_id", $this->getKey());
    }

    /**
     * Join the team with the given ID.
     *
     * @param  int $teamId
     * @return void
     */
    public function joinTeamById($teamId)
    {
        $this->teams()->attach([$teamId], ['role' => StartApp::defaultRole()]);
        $this->currentTeam();
        event(new JoinedTeam($this, $this->teams()->find($teamId)));
    }

    /**
     * Accessor for the currentTeam method.
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getCurrentTeamAttribute()
    {
        return $this->currentTeam();
    }

    /**
     * Get the team that user is currently viewing.
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function currentTeam()
    {
        if (is_null($this->current_team_id) && $this->hasTeams()) {
            $this->switchToTeam($this->teams->first());
            return $this->currentTeam();
        } elseif (!is_null($this->current_team_id)) {
            $currentTeam = $this->teams->find($this->current_team_id);
            return $currentTeam ?: $this->refreshCurrentTeam();
        }
    }

    /**
     * Switch the current team for the user.
     *
     * @param  App\Team $team
     * @return void
     */
    public function switchToTeam($team)
    {
        $this->current_team_id = $team->id;
        $this->save();
    }

    /**
     * Refresh the current team for the user.
     *
     * @return  App\Team
     */
    public function refreshCurrentTeam()
    {
        $this->current_team_id = null;
        $this->save();
        return $this->currentTeam();
    }

    /**
     * Determine if the given team is owned by the user.
     *
     * @param  App\Team $team
     * @return bool
     */
    public function ownsTeam($team)
    {
        if (is_null($team->owner_id) || is_null($this->id)) {
            return false;
        }
        return $this->id === $team->owner_id;
    }

    /**
     * Get the user's role on a given team.
     *
     * @param  App\Team $team
     * @return string
     */
    public function teamRole($team)
    {
        $team = $this->teams->find($team->id);
        if ($team) {
            return $team->pivot->role;
        }
    }

    /**
     * Get all of the pending invitations for the user.
     */
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}