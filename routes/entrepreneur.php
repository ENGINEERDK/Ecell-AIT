<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('entrepreneur')->user();

    //dd($users);

    return view('entrepreneur.home');
})->name('home');

