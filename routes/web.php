<?php

use Illuminate\Support\Facades\Route;

// Restore the root route to fix 404 error
Route::get('/', function () {
    return view('home');
});

// Keep the additional route for accessing the home page at /home
Route::get('/home', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
