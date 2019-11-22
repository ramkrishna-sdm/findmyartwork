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
Route::get('pay_now', 'Frontend\PaymentController@index');
Route::post('paypal', 'Frontend\PaymentController@payWithpaypal');
Route::get('status', 'Frontend\PaymentController@getPaymentStatus');

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
	
	// Gallery User Management
	Route::get('/gallery', 'Admin\GalleryUserController@index');
	Route::get('/add_gallery', 'Admin\GalleryUserController@add_gallery');
	Route::post('/update_gallery', 'Admin\GalleryUserController@update_gallery');
	Route::get('/edit_gallery/{id}', 'Admin\GalleryUserController@edit_gallery');
	Route::get('/delete_gallery/{id}', 'Admin\GalleryUserController@delete_gallery');
	Route::get('/change_gallery_status/{id}/{stauts}', 'Admin\GalleryUserController@change_gallery_status');
	
	// Artist Management
	Route::get('/artist', 'Admin\ArtistController@index');
	Route::get('/add_artist', 'Admin\ArtistController@add_artist');
	Route::post('/update_artist', 'Admin\ArtistController@update_artist');
	Route::get('/edit_artist/{id}', 'Admin\ArtistController@edit_artist');
	Route::get('/delete_artist/{id}', 'Admin\ArtistController@delete_artist');
	Route::get('/change_artist_status/{id}/{stauts}', 'Admin\ArtistController@change_artist_status');
	// Artwork Management
	Route::get('/artwork/{artist_id}', 'Admin\ArtworkController@index');
	Route::get('/view_artwork/{artist_id}', 'Admin\ArtworkController@view_artwork');
	Route::get('/get_gallery_images/{artist_id}', 'Admin\ArtworkController@get_gallery_images');
	Route::get('/change_artwork_status/{id}/{stauts}/{page}/{user_id?}', 'Admin\ArtworkController@change_artwork_status');
	Route::get('/change_top_status/{id}/{stauts}/{page}/{user_id?}', 'Admin\ArtworkController@change_top_status');
	Route::get('/change_trending_status/{id}/{stauts}/{page}/{user_id?}', 'Admin\ArtworkController@change_trending_status');
	Route::get('/manage_artworks', 'Admin\ArtworkController@manage_artworks');
	Route::get('/top_artwork', 'Admin\ArtworkController@top_artwork');
	Route::get('/trending_artwork', 'Admin\ArtworkController@trending_artwork');
	//category Management
	Route::get('/add_category','Admin\CategoryController@add_category');
	Route::post('update_category','Admin\CategoryController@update_category');
	Route::get('/category','Admin\CategoryController@index');
	Route::get('/edit_category/{id}', 'Admin\CategoryController@edit_category');
	Route::get('/delete_category/{id}', 'Admin\CategoryController@delete_category');
	Route::get('/change_category_status/{id}/{stauts}', 'Admin\CategoryController@change_category_status');
	//Subject Management
	Route::get('/add_subject','Admin\SubjectController@add_subject');
	Route::post('update_subject','Admin\SubjectController@update_subject');
	Route::get('/subject','Admin\SubjectController@index');
	Route::get('/edit_subject/{id}', 'Admin\SubjectController@edit_subject');
	Route::get('/delete_subject/{id}', 'Admin\SubjectController@delete_subject');
	Route::get('/change_subject_status/{id}/{stauts}', 'Admin\SubjectController@change_subject_status');
	//Style Management
	Route::get('/add_style','Admin\StyleController@add_style');
	Route::post('update_style','Admin\StyleController@update_style');
	Route::get('/style','Admin\StyleController@index');
	Route::get('/edit_style/{id}', 'Admin\StyleController@edit_style');
	Route::get('/delete_style/{id}', 'Admin\StyleController@delete_style');
	Route::get('/change_style_status/{id}/{stauts}', 'Admin\StyleController@change_style_status');
	//SubCategory Management
	Route::get('/add_subcategory','Admin\SubCategoryController@add_subcategory');
	Route::post('update_subcategory','Admin\SubCategoryController@update_subcategory');
	Route::get('/subcategory','Admin\SubCategoryController@index');
	Route::get('/edit_subcategory/{id}', 'Admin\SubCategoryController@edit_subcategory');
	Route::get('/delete_subcategory/{id}', 'Admin\SubCategoryController@delete_subcategory');
	Route::get('/change_subcategory_status/{id}/{stauts}', 'Admin\SubCategoryController@change_subcategory_status');
	//CMS Management
	Route::get('/add_aboutus', 'Admin\AboutUsController@add_aboutus');
	Route::post('/update_aboutus', 'Admin\AboutUsController@update_aboutus');
	Route::get('/add_cms','Admin\AboutUsController@add_cms');
	Route::post('/update_cms','Admin\AboutUsController@update_cms');


});

Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'ForgotPasswordController@sendResetLinkEmail');

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});


