<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/golongan', [App\Http\Controllers\GolonganController::class,'index']);
Route::get('/golongan/create', [App\Http\Controllers\GolonganController::class,'create']);
Route::post('/golongan', [App\Http\Controllers\GolonganController::class,'store']);
Route::get('/golongan/{id}/edit', [App\Http\Controllers\GolonganController::class, 'edit']);
Route::patch('/golongan/{id}', [App\Http\Controllers\GolonganController::class, 'update']);
Route::delete('/golongan/{id}', [App\Http\Controllers\GolonganController::class, 'destroy']);
Route::get('/golongan/{id}', [App\Http\Controllers\GolonganController::class, 'show']);


Route::get('/pelanggan', [App\Http\Controllers\PelangganController::class, 'index']);
Route::get('/pelanggan/create', [App\Http\Controllers\PelangganController::class, 'create']);
Route::post('/pelanggan', [App\Http\Controllers\PelangganController::class, 'store']);
Route::get('/pelanggan/{id}/edit', [App\Http\Controllers\PelangganController::class, 'edit']);
Route::patch('/pelanggan/{id}', [App\Http\Controllers\PelangganController::class, 'update']);
Route::delete('/pelanggan/{id}', [App\Http\Controllers\PelangganController::class, 'destroy']);
Route::get('/pelanggan/{id}', [App\Http\Controllers\PelangganController::class, 'show']);



Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/{id}', [UserController::class, 'update'])->name('user.update');


Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

