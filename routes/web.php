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
    return view('index',
[
    "name" => "Mohamed"
]
);
})->name("home");

Route::get('/redirect', function () {
    return redirect()->route("home");
});

Route::get('/greet/{name}', function ($name) {
    return "hello " . $name ."!";
})->name("greet");

Route::fallback(function () {
    return "404";
});