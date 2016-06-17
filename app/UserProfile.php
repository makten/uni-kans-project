<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'id',
        'avatar',
        'avatar_resized',
        'avatar_thumbnail',
        'skin',
        'skin_color_code',
        'user_id',
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }


    public function updateSettings($data, $settings)
    {
        $settings->skin = $data['skin'];
        $settings->skin_color_code = $data['skin_color_code'];
        $settings->save();
    }
}
