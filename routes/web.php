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

Route::get('/', function () {
  $event = DB::table('events')->orderBy('created_at', 'desc')->first();
    return view('welcome',compact('event'));
});

Route::get('/admin/dashboard', function () {
  $event = DB::table('events')->orderBy('created_at', 'desc')->first();
  $registrants = DB::table('event_registrations')->orderBy('created_at', 'desc')->get();
  $submissions = DB::table('idea_submissions')->orderBy('created_at', 'desc')->get();
    return view('admin.home',compact('event','registrants','submissions'));

});

Route::get('/entrepreneur/dashboard', function () {
  $event = DB::table('events')->orderBy('created_at', 'desc')->first();
  $registrants = DB::table('event_registrations')->where('user_id', Auth::guard('entrepreneur')->user()->id)->orderBy('created_at', 'desc')->get();

  $submissions = DB::table('idea_submissions')->where('user_id', Auth::guard('entrepreneur')->user()->id)->orderBy('created_at', 'desc')->get();
    return view('entrepreneur.home',compact('event','registrants','submissions'));
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

});

Route::group(['prefix' => 'entrepreneur'], function () {
  Route::get('/login', 'EntrepreneurAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'EntrepreneurAuth\LoginController@login');
  Route::post('/logout', 'EntrepreneurAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'EntrepreneurAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'EntrepreneurAuth\RegisterController@register');

  Route::post('/password/email', 'EntrepreneurAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'EntrepreneurAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'EntrepreneurAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'EntrepreneurAuth\ResetPasswordController@showResetForm');

  //email verification 
  Route::get('/account/verify/{token}', 'EntrepreneurAuth\RegisterController@verifyUser');
});


//Custom Routes

Route::resource('/events', 'EventController');

Route::resource('/Event-Registation', 'EventRegistrationController');

Route::resource('/Idea-Submission', 'IdeaSubmissionController');