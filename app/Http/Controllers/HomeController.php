<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Propositie;
use App\User;
use Datatables;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }


    public function landing()
    {
        return view('layouts.landing');
    }

    public function proposities()
    {
        $proposities = Propositie::orderBy('created_at', 'DESC')->paginate(5);
        $proposities->setPath('');
        return view('pages.proposities', compact('proposities'));
    }


    public function addUser()
    {
        return view('auth.register_form');
    }

    public function homepage()
    {
        return view('admin.pages.homepage');
    }

}
