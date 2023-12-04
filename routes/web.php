<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CitiesController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'role:Admin'])->name('admin.index');

Route::middleware('auth','role:Admin')->group(function () {
    Route::get('/page1', function () {
        return view('admin.index');
    })->name('page1');

    Route::get('/page2', function () {
        return view('admin.index2');
    })->name('page2');

    Route::get('/page3', function () {
        return view('admin.index3');
    })->name('page3');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Auth::routes();

Route::get('/', function () { return view('welcome'); });
Route::get('/create',[CountriesController::class,'store_api_data']);

Route::middleware('auth')->group(function () {
Route::resource('/company', CompanyController::class);
Route::resource('/employee', EmployeeController::class);
Route::get('/app2', [App\Http\Controllers\HomeController::class, 'index'])->name('app2');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('products', ProductController::class);
    Route::resource('/countries', CountriesController::class);
    Route::resource('/cities', CitiesController::class);
    Route::get('/details/{code}', [App\Http\Controllers\CountriesController::class, 'details'])->name('details');
    //Route::get('/countries', [CountriesController::class, 'getAppPost']);
    //Route::get('/details/{code}', [App\Http\Controllers\CountriesController::class, 'details'])->name('details');
});
