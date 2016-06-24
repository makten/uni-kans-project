<?php

namespace App\Http\Controllers;

use App\Admins;
use App\Marktsegment;
use App\Team;
use App\Thema;
use App\UserProfile;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Auth;
use App\User;
use Datatables;
use App\Propositie;
use Laracasts\Flash\Flash;


class PropositieController extends Controller
{

    /**
     * InnovationController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @param $id
     */
    public function show($propositie)
    {
//        $prop = Propositie::with(array('nestedReacties' => function ($q) {
//            $q->orderBy('reacties.id', 'ASC');
//        }, 'user.userprofile', 'team.users'))->where('id', $propositie)->first();

        $prop = Propositie::with(array('nestedReacties' => function ($q) {
            $q->orderBy('reacties.id', 'ASC');
        }, 'user.userprofile', 'team.users', 'reacties.user', 'reacties.replies.user', 'reacties.propositie'))->where('id', $propositie)->first();



        return response()->json($prop);

//        $team = $prop->team;
//        $teamMembers = $prop->team->users;

//        return view('admin.content.show', compact('prop', 'team', 'teamMembers'));
//        return view('admin.propositie.show', compact('prop'));
    }


    public function create(Request $request)
    {
        $themas = Thema::lists('thema_name', 'id')->all();
//        $admins = Admins::lists('mannr', 'id')->all();
        $marktsegmenten = Marktsegment::lists('markt_naam', 'id')->all();

        $userSettings = UserProfile::whereUserId($request->user()->id)->first();
        $user = User::findOrFail($request->user()->id);

        if ($request->user()->hasRole('admin') || $request->user()->hasRole('team member')) {

            return view('admin.propositie.create_edit_propositie', compact('themas', 'marktsegmenten', 'userSettings', 'user'));
        } else {
            abort('You do not have permission', 403);
            flash()->overlay('U heeft geen rechten om deze actie uit te voeren. Neem contact op met de admin!');
            return redirect()->back();
        }
    }

}
