<?php

namespace App\Http\Controllers\API;

use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id){

        $user = User::with('userprofile')->whereId($id)->first();

        return response()->json($user);
    }


    public function updateSkin($id)
    {
        $data = Input::all();

        $settings =  UserProfile::whereUserId($id)->first();
        $settings->updateSettings($data, $settings);
    }
}
