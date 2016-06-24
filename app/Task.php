<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Attributes that can't be mass assigned
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the team that the task belongs to
     */

    public function team(){
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the user that created the task
     */
    public function creator(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
