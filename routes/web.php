<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
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


Route::get('/',[LoginController::class, 'login'])->name('login');
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('/actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');


Route::get('/home',[HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/about',[AboutController::class, 'index']);
Route::get('/contact',[ContactController::class, 'index']);

Route::get('/siswa',[SiswaController::class, 'index']);
Route::get('/siswa/read',[SiswaController::class, 'read']);
Route::match(['get','post'],'/siswa/insert',[SiswaController::class, 'insert']);
Route::match(['get','post'],'/siswa/update/{id}',[SiswaController::class, 'update'])->name('siswa.update');
Route::get('siswa/delete/{id}',[SiswaController::class, 'delete'])->name('siswa.delete');
Route::get('siswa/data_table',[SiswaController::class, 'data_table'])->name('siswa.data_table');

Route::get('/guru', [GuruController::class, 'index']);
Route::get('/guru/read', [GuruController::class, 'read']);
Route::match(['get','post'],'/guru/insert',[GuruController::class, 'insert']);
Route::match(['get','post'],'/guru/update/{id}',[GuruController::class, 'update']);
Route::match(['get','post'],'/guru/delete/{id}',[GuruController::class, 'delete']);
Route::get('guru/data_table',[GuruController::class, 'data_table'])->name('guru.data_table');

Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/read', [KelasController::class, 'read']);
Route::match(['get','post'], 'kelas/insert', [KelasController::class, 'insert']);
Route::match(['get','post'], 'kelas/update/{id}', [KelasController::class, 'update']);
Route::match(['get','post'], 'kelas/delete/{id}', [KelasController::class, 'delete']);
Route::get('kelas/data_table',[KelasController::class, 'data_table'])->name('kelas.data_table');
