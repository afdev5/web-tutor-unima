<?php

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

Route::get('/', 'UtamaController@index')->name('index');
Route::post('/daftar', 'UtamaController@daftar')->name('daftar.post');
Route::get('/data-kelas-{id}-{tipe}', 'UtamaController@hasil')->name('daftar.hasil');
Route::post('/hasil-pencarian', 'UtamaController@cari')->name('cari');
Route::get('/sertifikat-{id}', 'UtamaController@sertifikat')->name('sertifikat');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/kelas',  'KelasController');
Route::get('/kelas-{id}', 'KelasController@peserta')->name('kelas.peserta');
Route::get('/hadir-{id}-{val}', 'KelasController@absen')->name('kelas.absen');
Route::post('/kelas-sertifikat', 'KelasController@serti')->name('kelas.serti');
