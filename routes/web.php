<?php

use App\Http\Controllers\DanaController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\isAdmin;


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
    return Auth::check() ? redirect('/home') : view('auth.login');
});


Route::prefix('user')->middleware('auth',isAdmin::class)->group(function(){
    Route::resource('dana', DanaController::class);

    Route::resource('pemasukan', PemasukanController::class);

    Route::resource('pengeluaran', PengeluaranController::class);
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil');
