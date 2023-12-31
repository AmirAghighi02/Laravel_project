<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('user')->group(function () {
    Route::get("/test", function () {
        return "AMIR";
    });

    Route::get("/test/{text}", function ($text) {
        return $text;
    })->whereAlpha('text');


    Route::get('/sum/{a}/{b}', function ($a, $b) {
        return $a + $b;
    })->whereNumber(['a', 'b']);
    Route::get('/parameter/{x?}', function ($x = null) {
        return !is_null($x);
    });
    Route::get('/national-code/{code}', function ($code) {
        return $code;
    })->where('code', '^[0-9]{10}$');
});
