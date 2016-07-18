<?php




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
*/

Route::group([
    'prefix' => 'api',
    'middleware' => 'auth',

], function () {
    Route::auth();
    /**
     * Admin routes...
     */
    Route::get('userprofile/{id}/show', 'API\UserProfileController@show');
    Route::post('userprofile/{id}/updateSkin', 'API\UserProfileController@updateSkin');
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@dashboard']);

    /**
     * Propositie routes
     */
    Route::get('proposities/all', ['as' => 'fetch.proposities', 'uses' => 'API\PropositieController@all']);
    Route::get('content/{id}/show', ['as' => 'show.content', 'uses' => 'PropositieController@show']);


    /**
     * Task routes
     */

    Route::get('teams/{team}/tasks', 'API\TaskController@all');
    Route::get('task/create', 'API\TaskController@create');
    Route::post('teams/{team}/tasks', 'API\TaskController@store');
    Route::get('/teams/{team}/tasks/{task}', 'API\TaskController@show');
});
