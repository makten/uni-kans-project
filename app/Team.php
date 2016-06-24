<?php

namespace App;

use App\Events\RemovedFromTeam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Team extends Model
{
//    protected $fillable = [
//        'team_name',
//        'pro_id',
//        'user_id'
//    ];


    /**
     * Get content associated with a given team
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propositie()
    {
        return $this->belongsTo('App\Propositie');
    }

//    /**
//     * Get users associated with a given team
//     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
//     */
//    public function users()
//    {
//        return $this->belongsToMany('App\User');
//    }

    /**
     * Get all of the users that belong to the team.
     */
    public function users()
    {
        return $this->belongsToMany(
            config('auth.providers.users.model'), 'user_teams', 'team_id', 'user_id'
        )->withPivot('role');
    }

    /**
     * Get all of the tasks beloging to the team
     */
    public function tasks(){
        return $this->hasMany(Task::class);
    }


    /**
     * Get the owner of the team.
     */
    public function owner()
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'owner_id');
    }
    /**
     * Get all of the pending invitations for the team.
     */
    public function invitations()
    {
        return $this->hasMany(Invitation::class)->orderBy('created_at', 'desc');
    }
    /**
     * Invite a user to the team by e-mail address.
     *
     * @param  string  $email
     * @return \Laravel\Spark\Teams\Invitation
     */
    public function inviteUserByEmail($email)
    {
        $model = config('auth.providers.users.model');
        $invitedUser = (new $model)->where('email', $email)->first();
        $invitation = $this->invitations()
            ->where('email', $email)->first();
        if (! $invitation) {
            $invitation = $this->invitations()->create([
                'user_id' => $invitedUser ? $invitedUser->id : null,
                'email' => $email,
                'token' => str_random(40),
            ]);
        }
        $email = $invitation->user_id
            ? 'spark::emails.team.invitations.existing'
            : 'spark::emails.team.invitations.new';
        Mail::send($email, compact('invitation'), function ($m) use ($invitation) {
            $m->to($invitation->email)->subject('New Invitation!');
        });
        return $invitation;
    }
    /**
     * Remove a user from the team by their ID.
     *
     * @param  int  $userId
     * @return void
     */
    public function removeUserById($userId)
    {
        $this->users()->detach([$userId]);
        $userModel = config('auth.providers.users.model');
        $removedUser = (new $userModel)->find($userId);
        if ($removedUser) {
            $removedUser->refreshCurrentTeam();
        }
        event(new RemovedFromTeam($removedUser, $this));
    }


}
