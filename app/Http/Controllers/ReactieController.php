<?php

namespace App\Http\Controllers;

use App\Admins;
use App\Team;
use App\Thema;
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

class ReactieController extends Controller
{

    function __construct()
    {
        $this->middleware("auth");
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['comment_parent'] = $request->get('reply_to');
        $data['user_id'] = Auth::user()->id;
        $reactie = Auth::user()->reacties()->create($data);
        return redirect()->to(\URL::previous(). '#tab3');

    }

    public function storeComment(Request $request)
    {
        $data = $request->all();

//        dd($data);
        $reactie = Auth::user()->reacties()->create($data);
        return redirect()->to(\URL::previous(). '#tab3');
    }
}
