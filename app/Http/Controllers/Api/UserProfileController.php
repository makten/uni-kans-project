<?php

namespace App\Http\Controllers\API;

use App\UserProfile;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth.admin');
        $this->middleware('auth');
    }

    public function index(){
        return response()->json("You made it here");
    }

    public function updateSkin()
    {
        $data = Input::all();
        $settings =  UserProfile::whereUserId($data['user_id'])->first();
        $settings->updateSettings($data, $settings);
    }
}
