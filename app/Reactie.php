<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reactie extends Model
{
    protected $fillable = [
        'propositie_id',
        'user_id',
        'comment_parent',
        'message'
    ];


    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function replies()
    {
        return $this->hasMany('App\Reactie', 'comment_parent');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function propositie()
    {
        return $this->belongsTo('App\Propositie');
    }

//    public function setCreatedAtAttribute($date)
//    {
//        $this->attributes['created_at'] = Carbon::createFromFormat('d-m-Y', $date);
//    }
}
