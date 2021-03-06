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
    /**
     * Admin routes...
     */
    Route::get('userprofile/{id}/updateSkin', 'API\UserProfileController@updateSkin');
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@dashboard']);
});
