<?php

namespace App\Http\Controllers;

use App\Propositie;
use App\UserProfile;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Auth;
use App\User;
use Datatables;

class AdminController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(Request $request)
    {

        if($request->user()->hasRole('admin'))
        {
            $userSettings = UserProfile::whereUserId($request->user()->id)->first();
            return view('administration.dashboard', compact('userSettings'));
        }
        elseif($request->user()->hasRole('propositieteam'))
        {
            return "proposite team dashboard under construction";
//            return view('administration.dashboard');
        }
        else{
//            flash()->overlay('U heeft geen rechten om deze pagina te bezoeken. Neem contact op met de admin!');
//            return redirect()->back();
            return redirect()->back();
        }
    }



    public function getProposities(Propositie $propositie)
    {
//        $proposities = $propositie->where('pro_state', '=', 1)->orderBy('created_at', 'DESC')->get();
        $proposities = $propositie->orderBy('created_at', 'DESC')->get();

        return Datatables::of($proposities)
            //            ->addColumn('lastlogin', function($model){
//
//                $lastlogin = $model->last_login != '' ? date('d-m-Y, H:i:s', strtotime($model->last_login)) : '--';
//                return $lastlogin;
//            })

//            ->editColumn('ino_avatar', function (Propositie $propositie) {

//                $image = str_replace(public_path(), '', $propositie->ino_avatar);
//                $avatar = '<img class="profile-img" src="'.$image.'" heigh="20" width="20"/>';

//                return $avatar;
//            })
//            ->editColumn('ino_status', function (Propositie $propositie) {
//
//                $inprogress = $propositie->ino_status == 'In progress' ? '<option value="In progress" selected>In progress</option>' : '<option value="In progress">In progress</option>';
//                $inpilot = $propositie->ino_status == 'In pilot' ? '<option value="In pilot" selected>In pilot</option>' : '<option value="In pilot">In pilot</option>';
//                $rollout = $propositie->ino_status == 'Roll-out' ? '<option value="Roll-out" selected>Roll-out</option>' : '<option value="Roll-out">Roll-out</option>';
//                $definitief = $propositie->ino_status == 'Definitief' ? '<option value="Definitief" selected>Definitief</option>' : '<option value="Definitief">Definitief</option>';
//
//                $status = '<select name="status" class="btn btn-primary btn-xs ssss">'
//                                .$inprogress. $inpilot.$rollout.$definitief.'
//                            </select>';
//
//                return $status;
//            })

            ->editColumn('created_at', function(Propositie $propositie){
                return date('d-m-Y', strtotime($propositie->created_at));
            })
            ->editColumn('pro_name', function (Propositie $propositie) {

                return '<a href="/propositie/' . $propositie->id. '" class="iframe">'.$propositie->pro_name.'</a>';
            })
            ->addColumn('contactpersoon', function (Propositie $propositie) {

                $contactpersoon = $propositie->user->first_name . ' ' . $propositie->user->last_name;
                return $contactpersoon;
            })
            ->add_column('actie', function (Propositie $propositie) {
                $proposities = $propositie->get();
                return '<a href="admin/propositie/' . $propositie->id . '/edit" class="iframe" style="color: #2978FD; font-weight:bold;"><span> <i class="fa fa-pencil "></i> Wijzig</span> </a> &nbsp; | &nbsp;

                <a href="admin/propositie/' . $propositie->id . '/delete" class="iframe" style="color: #FF523A; font-weight:bold;"><span> <i class="fa fa-trash"></i> Verwijder</span></a>';

            })
            ->make(true);
    }


    public function getAfwaktende(Propositie $propositie)
    {
//        $proposities = $propositie->where('pro_state', '=', 1)->orderBy('created_at', 'DESC')->get();
        $proposities = $propositie->orderBy('created_at', 'DESC')->get();

        return Datatables::of($proposities)
            //            ->addColumn('lastlogin', function($model){
//
//                $lastlogin = $model->last_login != '' ? date('d-m-Y, H:i:s', strtotime($model->last_login)) : '--';
//                return $lastlogin;
//            })

//            ->editColumn('ino_avatar', function (Propositie $propositie) {

//                $image = str_replace(public_path(), '', $propositie->ino_avatar);
//                $avatar = '<img class="profile-img" src="'.$image.'" heigh="20" width="20"/>';

//                return $avatar;
//            })
//            ->editColumn('ino_status', function (Propositie $propositie) {
//
//                $inprogress = $propositie->ino_status == 'In progress' ? '<option value="In progress" selected>In progress</option>' : '<option value="In progress">In progress</option>';
//                $inpilot = $propositie->ino_status == 'In pilot' ? '<option value="In pilot" selected>In pilot</option>' : '<option value="In pilot">In pilot</option>';
//                $rollout = $propositie->ino_status == 'Roll-out' ? '<option value="Roll-out" selected>Roll-out</option>' : '<option value="Roll-out">Roll-out</option>';
//                $definitief = $propositie->ino_status == 'Definitief' ? '<option value="Definitief" selected>Definitief</option>' : '<option value="Definitief">Definitief</option>';
//
//                $status = '<select name="status" class="btn btn-primary btn-xs ssss">'
//                                .$inprogress. $inpilot.$rollout.$definitief.'
//                            </select>';
//
//                return $status;
//            })

            ->editColumn('created_at', function(Propositie $propositie){
                return date('d-m-Y', strtotime($propositie->created_at));
            })
            ->editColumn('pro_name', function (Propositie $propositie) {

                return '<a href="/propositie/' . $propositie->id. '" class="iframe">'.$propositie->pro_name.'</a>';
            })
            ->addColumn('contactpersoon', function (Propositie $propositie) {

                $contactpersoon = $propositie->user->first_name . ' ' . $propositie->user->last_name;
                return $contactpersoon;
            })
            ->add_column('actie', function (Propositie $propositie) {
                $proposities = $propositie->get();
                return '<a href="admin/propositie/' . $propositie->id . '/edit" class="iframe" style="color: blue; font-weight:bold;"><span> <i class="fa fa-pencil "></i> Wijzig</span> </a>  ||
                <a href="admin/propositie/' . $propositie->id . '/delete" class="iframe" style="color: green; font-weight:bold;"><span> <i class="fa fa-thumbs-up "></i> Akkoord</span></a> ||
                <a href="admin/propositie/' . $propositie->id . '/delete" class="iframe" style="color: red; font-weight:bold;"><span> <i class="fa fa-trash"></i> Verwijder</span></a>';

            })
            ->make(true);
    }

}
