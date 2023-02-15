<?php

use App\Http\Controllers\HelloController;
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

Route::get("/rizal", function () {
    return "Muhammad Rizal Firdaus";
});

Route::get("/hello-world", function () {
    return view("hello.world", ["name" => "Rizal"]);
});

Route::redirect('/about', '/rizal');

Route::fallback(function () {
    return "404 Not Found";
});

Route::get("/hello-indonesia/{name}", [HelloController::class, "hello_indo"]);
Route::get("/foo-bar", [HelloController::class, "bar"]);
