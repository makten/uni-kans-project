<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'team_name',
        'pro_id',
        'user_id'
    ];


    /**
     * Get content associated with a given team
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propositie()
    {
        return $this->belongsTo('App\Propositie');
    }

    /**
     * Get users associated with a given team
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
