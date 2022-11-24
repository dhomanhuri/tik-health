<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\newuserController;
use App\Models\Artikel;
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

Route::get('/',[ArtikelController::class,'index']);

Auth::routes();


Route::resource('artikel', ArtikelController::class);
Route::get('/artikeldel/{artikel}',[ArtikelController::class,'destroy']);

// route grub middleware admin
Route::middleware(['auth','admin'])->group(function(){
    Route::resource('user', newuserController::class);
    Route::get('/userdel/{user}',[newuserController::class, 'destroy']);
    Route::POST('/actbmi',[newuserController::class, 'actbmi']);
});
// route grub middleware editor
Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('kategori', KategoriController::class);
    route::get('/kategoridel/{kategori}',[KategoriController::class, 'destroy']);

});