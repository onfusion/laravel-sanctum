<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function () {
    return "<h3>Hello, this is Laravel Web API & route from api.php, URL path will be different to access it.</h3>";
});

Route::get('users/{id}', function ($id) {
    return '<p>Here user id is:<b>' . $id . '</b></p>';
});