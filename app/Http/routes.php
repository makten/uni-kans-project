<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Role;
use App\User;
use App\Propositie;

use App\Http\Requests;
use Illuminate\Http\Request;




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::get('createPermission', function () {

    $adminRole = Role::create([
        'role_name' => 'Admin',
        'slug' => 'admin',
        'level' => 1
    ]);

    $teamRole = Role::create([
        'role_name' => 'team member',
        'slug' => 'team.member',
        'level' => 2
    ]);

//    $perm1 = Permission::find(1);
//    $perm2 = Permission::find(2);
//    $perm3 = Permission::find(3);
//    $perm4 = Permission::find(4);
//    $perm5 = Permission::find(5);

    $user = User::find(1);

    $adminRole = Role::find(1);

    $user->attachRole($adminRole);

//    $adminRol->attachPermission($perm1);
//    $adminRol->attachPermission($perm2);
//    $adminRol->attachPermission($perm3);
////    $adminRol->attachPermission($perm4);
//    $adminRol->attachPermission($perm5);

//    Permission::create([
//        'name' => 'Create user',
//        'slug' => 'user.create',
//        'description' => 'Able to create a user',
//    ]);
//
//    Permission::create([
//        'name' => 'Edit user',
//        'slug' => 'user.edit',
//        'description' => 'Able to Edit a user',
//    ]);
//
//    Permission::create([
//        'name' => 'Delete user',
//        'slug' => 'user.delete',
//        'description' => 'Able to create a user',
//    ]);


    dd($user);
});



/********************* Site Routes ****************************/

//Route::get('/home', 'HomeController@home');
//Route::get('/homepage', 'HomeController@homepage');
//Route::get('home', 'HomeController@home');
//Route::get('about', 'PagesController@about');
//Route::get('contact', 'PagesController@contact');
//Route::get('articles', 'ArticlesController@index');
//Route::get('article/{slug}', 'ArticlesController@show');
//Route::get('video/{id}', 'VideoController@show');
//Route::get('photo/{id}', 'PhotoController@show');
//
//Route::Controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);

/****************   Model binding into route **************************/


/*********************      Admin Routes **********************/

Route::get('/landing', 'HomeController@landing');

Route::get('/typeahead', function(){

//    $pr = \App\Propositie::find(2);

//    $th = \App\Thema::find(1);

//    $pr->themas()->attach($th);

    $pros = \App\Propositie::all();

    return response()->json($pros);
});

Route::get('/api/search/{query}', function($query){


//    $proposities = \App\Propositie::where('pro_name', 'LIKE', "%{$query}%")->latest()->get();
    $proposities = \App\Propositie::with('user.userprofile')->where('pro_name', 'LIKE', "%{$query}%")->latest()->paginate(12);

    $response =[
        'pagination' => [
            'total' => $proposities->total(),
            'per_page' => $proposities->perPage(),
            'current_page' => $proposities->currentPage(),
            'last_page' => $proposities->lastPage(),
            'from' => $proposities->firstItem(),
            'to' => $proposities->lastItem()
        ],
        'data' => $proposities
    ];

//    return view('pages.searchresult', compact('proposities', 'keyword', 'gevonden'));
    return response()->json($response);
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();


   Route::get('propositie/{id}/show', function($id){

       $pro = Propositie::with(['user.userprofile', 'themas'])->findOrFail($id);
       $userSettings = \App\UserProfile::whereUserId(Auth::user()->id)->first();

       return view('admin.propositie.show', ['propositie' => $pro, 'userSettings' => $userSettings]);
   });

       // ---------------Admin routes ----------------------------

    Route::post('store/settings', ['as' => 'skin.store', 'uses' => 'UserProfileController@updateSkin']);

    Route::get('/', 'HomeController@landing');
//    Route::get('/home', 'AdminController@home');
    Route::get('/proposities', 'HomeController@proposities');

//    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@dashboard']);
    Route::get('/getProposities', ['as'=>'propositie.getProposities', 'uses'=>'AdminController@getProposities']);
    Route::post('user.store', ['as' => 'user.store', 'uses' => 'UserController@store']);
    Route::post('role.store', ['as' => 'role.store', 'uses' => 'RoleController@store']);
    Route::get('/getUsers', 'UserController@getUsers');
    Route::get('user.show/{id}', 'UserController@show');
    Route::get('user.edit/{id}', 'UserController@edit');
    Route::post('user.update/{id}', ['as' => 'user.update', 'uses' => 'UserController@update']);
//    Route::post('user.assignRole/{id}', ['as' => 'user.assignRole', 'uses' => 'UserController@assignRole']);

    Route::get('admin/propositie/create', ['as'=>'propositie.create', 'uses'=>'PropositieController@create']);
    Route::post('admin/propositie/store', ['as'=>'propositie.store', 'uses'=>'PropositieController@store']);


//    Route::get('/propositie/{id}/show', ['as'=>'propositie.show', 'uses'=>'PropositieController@show']);
    Route::get('propositie/{propositie}', ['as'=>'propositie.show', 'uses'=>'PropositieController@show']);
    Route::get('admin/propositie/{id}/edit', ['as'=>'propositie.edit', 'uses'=>'PropositieController@edit']);
    Route::put('admin/propositie/{id}/update', ['as'=>'propositie.update', 'uses'=>'PropositieController@update']);
    Route::get('admin/propositie/{id}/delete', ['as'=>'propositie.delete', 'uses'=>'PropositieController@delete']);
    Route::post('/search', ['as'=>'proposities.search', 'uses'=>'PropositieController@search']);


    Route::post('/comment', ['as'=>'comment.store', 'uses'=>'ReactieController@storeComment']);
    Route::post('/comment/reply', ['as'=>'commentreply.store', 'uses'=>'ReactieController@store']);

//    Route::get('/addProduct', ['as'=>'product.create', 'uses'=>'ProductController@create']);
//    Route::get('/test', ['as'=>'product.create', 'uses'=>'ProductController@test']);

    Route::get('/teams/{team}/tasks/{task}', 'TaskController@show');

});
