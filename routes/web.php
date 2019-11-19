<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/admin', 'Auth\LoginController@admin')->name('admin');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	// Buyer Management
	Route::get('/buyer', 'Admin\BuyerController@index');
	Route::get('/add_buyer', 'Admin\BuyerController@add_buyer');
	Route::post('/update_buyer', 'Admin\BuyerController@update_buyer');
	Route::get('/edit_buyer/{id}', 'Admin\BuyerController@edit_buyer');
	Route::get('/delete_buyer/{id}', 'Admin\BuyerController@delete_buyer');
	Route::get('/change_buyer_status/{id}/{stauts}', 'Admin\BuyerController@change_buyer_status');
	
	// Artist Management
	Route::get('/artist', 'Admin\ArtistController@index');
	Route::get('/add_artist', 'Admin\ArtistController@add_artist');
	Route::post('/update_artist', 'Admin\ArtistController@update_artist');
	Route::get('/edit_artist/{id}', 'Admin\ArtistController@edit_artist');
	Route::get('/delete_artist/{id}', 'Admin\ArtistController@delete_artist');
	Route::get('/change_artist_status/{id}/{stauts}', 'Admin\ArtistController@change_artist_status');

});

Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'ForgotPasswordController@sendResetLinkEmail');

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
Route::resource('category', 'CategoryController');

