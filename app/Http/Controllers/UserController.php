<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Bican\Roles\Models\Permission;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;

class UserController extends Controller
{
    function __construct(){
    	$this->middleware('auth');
    }

	public function store(Request $request)
	{

		$validator = $this->validator($request->all());

		$count_users = User::where('client_id', '=', $request['client_id'])->get();

		if ($count_users->count() >= 3) {

			Session::flash('message', 'You have added the maximum number of users already');
			return back()->withInput();
		} else {
			if ($validator->fails()) {
				$this->throwValidationException(
					$request, $validator
				);
			}
			$this->create($request->all());

			\Session::flash('message', "User created successfully");

			return redirect('dashboard');
		}


	}

        /**
         * Get a validator for an incoming registration request.
         *
         * @param  array  $data
         * @return \Illuminate\Contracts\Validation\Validator
         */
        protected function validator(array $data)
        {

        	return Validator::make($data, [
        		'first_name' => 'required|max:255',
        		'last_name' => 'required|max:255',
				'client_id' => 'required',
        		'email' => 'required|email|max:255|unique:users',
        		'password' => 'required|confirmed|min:6',
        		]);
        }

        /**
         * Create a new user instance after a valid registration.
         *
         * @param  array  $data
         * @return User
         */
        protected function create(array $data)
        {

			return User::create([
				'first_name' => $data['first_name'],
				'last_name' => $data['last_name'],
				'client_id' => $data['client_id'],
				'email' => $data['email'],
//        		'user_role' => $data['user_role'],
				'password' => bcrypt($data['password']),
			]);


        }

        public function getUsers(User $user)
        {
        	$users = '';

        	$users = $user->orderBy('created_at', 'DESC')->limit(10)->get();

        	return Datatables::of($users)

    	                // ->addColumn('contractNaam', function($model){

    	                //         $gebruikers = DB::table('inrichting_team')->lists('mannr');      
    	                //         if(in_array(session('gebruiker'), $gebruikers))
    	                //         {
    	                //             return '<a href="contract/aanvraagRegieContract/'. $model->id.' ">'.$model->contract_naam .'</a>';
    	                //         } 
    	                //         else
    	                //         {
    	                //             $info = $model->opmerking_verstuur != '' ? '<i title="'. $model->opmerking_verstuur.'" id="basic-addon1" class="addon bottom fa fa-info-circle"></i>' : '';
    	                //             return '<a href="contract/gegevensInzien/'. $model->id.'/acBvZzKFV6apHDD7FsxHOQ== ">'.$model->contract_naam .'</a> '. $info;

    	                //         }

    	                //     })

    	                    // ->addColumn('indien_datum', function($model){
    	                    // return date('d-m-Y, H:i:s', strtotime($model->created_at));
    	                    // })

    	                    //  ->addColumn('indiener', function($model){
    	                    //      $userName = Personen::select('mpers_persnr', DB::raw('CONCAT(mpers_initialen, " ", mpers_achternaam) AS indiener'))                 
    	                    //      ->where('mpers_persnr', '=', $model->mannr)
    	                    //      ->where('mpers_indienst', '=', 1)->lists('indiener', 'mpers_persnr');

    	                    //          $vall = '';
    	                    //          foreach($userName as $val)
    	                    //          {
    	                    //             $vall = $val;
    	                    //          }
    	                    //      return $vall;
    	                    //  })

    	                    //  ->addColumn('uitvoer', function($model){
    	                    //      $userName = Personen::select('mpers_persnr', DB::raw('CONCAT(mpers_initialen, " ", mpers_achternaam) AS uitvoerende'))
    	                    //      ->where('mpers_indienst', '=', 1)
    	                    //      ->where('mpers_persnr', '=', $model->uitvoerende)->lists('uitvoerende', 'mpers_persnr');

    	                    //          $vall = '';
    	                    //          foreach($userName as $val)
    	                    //          {
    	                    //             $vall = $val;
    	                    //          }
    	                    //      return $vall;
    	                    //  })

    	                     ->addColumn('manage', function($model){
    	                           
    	                     return '<a class="btn btn-success btn-xs" href="user.edit/'. $model->id.'">'.'Manage</a>';
    	                     })
    	                    ->addColumn('countResult', function(User $user){ 
    	                        $users = $user->get();
    	                    	return $users->count($users);
    	                    })
    	                    ->addColumn('lastlogin', function($model){

    	                    	$lastlogin = $model->last_login != '' ? date('d-m-Y, H:i:s', strtotime($model->last_login)) : '--';
    	                    return $lastlogin;
    	                    }) 
    	                    

        	->make(true); 
        }


        public function edit($id)
		{


			if (Auth::user()->isAdmin())
			{
				$user = User::find($id);

				$perms = $user->getPermissions()->lists('slug')->toArray();
				$num_perms = count($perms);

//				dd($perms);
				session(['edit_id' => $user->id]);

				return view('administration.edit_user', compact('user', 'perms', 'num_perms'));
			}
			else
			{
				Session::flash('message', 'You do not have permission to do this');
				return redirect('dashboard');
			}

        }


	public function update($id)
	{

	}


	public function assignRole($id, Request $request)
	{
		$user = User::find($id);


		$user->detachAllPermissions();

		if($request->has('permissions'))
		{
			foreach($request->input('permissions') as $perm)
			{
				$permission = Permission::find($perm);

//				print_r($permission->name);

				$user->attachPermission($permission);
			}
		}

//		dd($request->input('permissions')[0]);
	}

        /**
         * Get the guard to be used during registration.
         *
         * @return string|null
         */
        protected function getGuard()
        {
        	return property_exists($this, 'guard') ? $this->guard : null;
        }


}
