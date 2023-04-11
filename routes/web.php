<?php

use App\Http\Controllers\IceCreamController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', [LoginController::class, 'showLoginForm']);

Route::get('/register', [RegisterController::class, 'showRegisterForm']);

Auth::routes();
Route::middleware(['auth'])->group(function(){
    Route::get('/home', function () {
        echo view('ice_cream.ice_cream');
    });

    Route::get('/logout', [LoginController::class, 'logout']);
});