<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\Admin\PlaceController as AdminPlaceController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


Route::get('/admin-test', function () {
    return 'Bạn đang ở trang Admin';
})->middleware(['auth', 'admin']);


/*
|--------------------------------------------------------------------------
| ADMIN - QUẢN LÝ ĐỊA ĐIỂM
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::resource(
            'places',
            AdminPlaceController::class
        );

    });




Route::get(
    '/places',
    [PlaceController::class, 'index']
)->name('places.index');

Route::get(
    '/places/{slug}',
    [PlaceController::class, 'show']
)->name('places.show');