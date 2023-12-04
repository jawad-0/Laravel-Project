<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
     
Route::middleware('auth:api')->group( function () {
    Route::resource('products', ProductController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('employee', EmployeeController::class);
});

// 1st Try

// Route::post('register',[UserController::class,'register']);
// Route::post('login',[UserController::class,'login']);

// Route::middleware('auth:api')->group(function(){
//     Route::get('get-user',[UserController::class,'userInfo']);
// });

// 2nd Try

// Route::controller(UserController::class)->group(function(){
//     Route::post('login','loginUser');
// });

// Route::controller(UserController::class)->group(function(){
//     Route::get('login','getUserDetail');
//     Route::get('logout','userLogout');
// })->middleware('auth:api');