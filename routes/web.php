<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::get('/cache-demo', function () {
    // Check if the result is already in the cache
    if (Cache::has('demo_cache')) {
        $result = Cache::get('demo_cache');
    } else {
        // If not, generate a new result and cache it for 5 minutes
        $result = 'This is a cached result generated at ' . now();
        Cache::put('demo_cache', $result, now()->addMinutes(1));  
    }

    return $result;
});