<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataApi;
use App\Http\Controllers\EmployeeController;

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

// Static User data from controller
Route::get('/data', [dataApi::class, 'articleData']);

// Public Routes
Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/{id}', [EmployeeController::class, 'show']);
Route::post('/employee', [EmployeeController::class, 'store']);
Route::put('/employee/{id}', [EmployeeController::class, 'update']);
Route::delete('/employee/{id}', [EmployeeController::class, 'destroy']);
Route::get('/employee/search/{name}', [EmployeeController::class, 'srearch']);