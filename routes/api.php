<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataApi;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/users', function () {
    return "<h3>Hello, this is Laravel Web API & route from api.php, URL path will be different to access it.</h3>";
});

Route::get('users/{id}', function ($id) {
    return '<p>Here user id is:<b>' . $id . '</b></p>';
});

// Static User data from controller
Route::get('/data', [dataApi::class, 'articleData']);

// Public Routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
// Route::get('/employee', [EmployeeController::class, 'index']);
// Route::get('/employee/{id}', [EmployeeController::class, 'show']);
// Route::post('/employee', [EmployeeController::class, 'store']);
// Route::put('/employee/{id}', [EmployeeController::class, 'update']);
// Route::delete('/employee/{id}', [EmployeeController::class, 'destroy']);
// Route::get('/employee/search/{name}', [EmployeeController::class, 'srearch']);

// Protected Routs
// Route::middleware('auth:sanctum') -> get('/employee', [EmployeeController::class, 'index']);
// Route::middleware('auth:sanctum') -> get('/employee/{id}', [EmployeeController::class, 'show']);

// Protected Routs Group
// Route::middleware(['auth:sanctum']) -> group(function () {
//     Route::get('/employee', [EmployeeController::class, 'index']);
//     Route::get('/employee/{id}', [EmployeeController::class, 'show']);
//     Route::post('/employee', [EmployeeController::class, 'store']);
//     Route::put('/employee/{id}', [EmployeeController::class, 'update']);
//     Route::delete('/employee/{id}', [EmployeeController::class, 'destroy']);
//     Route::get('/employee/search/{name}', [EmployeeController::class, 'srearch']);
//     Route::post('/logout', [UserController::class, 'logout']);
// });

// Partially Public Routes
// Route::get('/employee', [EmployeeController::class, 'index']);
// Route::get('/employee/{id}', [EmployeeController::class, 'show']);
Route::get('/employee/search/{name}', [EmployeeController::class, 'srearch']);

// Partially Protected Routes
Route::middleware(['auth:sanctum']) -> group(function () {
    // Route::post('/employee', [EmployeeController::class, 'store']);
    // Route::put('/employee/{id}', [EmployeeController::class, 'update']);
    // Route::delete('/employee/{id}', [EmployeeController::class, 'destroy']);
    Route::post('/logout', [UserController::class, 'logout']);
});

// All User List
Route::middleware('auth:sanctum') -> get('/user', function (Request $request) {
    return $request -> user();
});

// Single Route for CRUD
Route::resource('employee', EmployeeController::class);