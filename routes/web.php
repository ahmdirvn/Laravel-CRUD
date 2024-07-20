<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home',[HomeController::class, 'index']);
Route::get('/about',[AboutController::class, 'index']);
Route::get('/contact',[ContactController::class, 'index']);
Route::get('/siswa',[SiswaController::class, 'index']);
Route::match(['get','post'],'/siswa/insert',[SiswaController::class, 'insert']);
Route::match(['get','post'],'/siswa/update/{id}',[SiswaController::class, 'update']);
Route::match(['get','post'],'/siswa/delete/{id}',[SiswaController::class, 'delete']);


Route::get('/guru', [GuruController::class, 'index']);
Route::match(['get','post'],'/guru/insert',[GuruController::class, 'insert']);
Route::match(['get','post'],'/guru/update/{id}',[GuruController::class, 'update']);
Route::match(['get','post'],'/guru/delete/{id}',[GuruController::class, 'delete']);


Route::get('/kelas', [KelasController::class, 'index']);
Route::match(['get','post'], 'kelas/insert', [KelasController::class, 'insert']);
Route::match(['get','post'], 'kelas/update/{id}', [KelasController::class, 'update']);
Route::match(['get','post'], 'kelas/delete/{id}', [KelasController::class, 'delete']);
