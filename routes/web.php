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

Route::get('/', 'HomeController@index');
Route::prefix('dosen')->group(function () {
    Route::get('/', 'DosenController@index')->name('dosen');
   
});

Route::prefix('kelas')->group(function () {
    Route::get('/', 'KelasController@index')->name('kelas');
   
});

Route::prefix('jadwal')->group(function () {
    Route::get('/', 'JadwalController@index')->name('jadwal');
    Route::get('/tambah-jadwal', 'JadwalController@create')->name('tambah-jadwal');
    Route::post('/proses-tambah-jadwal', 'JadwalController@store')->name('proses-tambah-jadwal');
    Route::post('/show-jadwal/{jadwal}', 'JadwalController@edit')->name('show-jadwal');
    Route::patch('/proses-edit-jadwal', 'JadwalController@update')->name('proses-edit-jadwal');
    Route::delete('/hapus-jadwal/{jadwal}', 'JadwalController@destroy')->name('hapus-jadwal');
});
