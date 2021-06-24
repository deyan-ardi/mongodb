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
    Route::get('/tambah-dosen', 'DosenController@create')->name('tambah-dosen');
    Route::post('/proses-tambah-dosen', 'DosenController@store')->name('proses-tambah-dosen');
    Route::post('/show-dosen/{dosen}', 'DosenController@edit')->name('show-dosen');
    Route::patch('/proses-edit-dosen', 'DosenController@update')->name('proses-edit-dosen');
    Route::delete('/hapus-dosen/{dosen}', 'DosenController@destroy')->name('hapus-dosen');
});

Route::prefix('kelas')->group(function () {
    Route::get('/', 'KelasController@index')->name('kelas');
    Route::get('/tambah-kelas', 'KelasController@create')->name('tambah-kelas');
    Route::post('/show-kelas/{kelas}', 'KelasController@edit')->name('show-kelas');
    Route::post('/proses-tambah-kelas', 'KelasController@store')->name('proses-tambah-kelas');
    Route::patch('/proses-edit-kelas', 'KelasController@update')->name('proses-edit-kelas');
    Route::delete('/hapus-kelas/{kelas}', 'KelasController@destroy')->name('hapus-kelas');
});

Route::prefix('jadwal')->group(function () {
    Route::get('/', 'JadwalController@index')->name('jadwal');
    Route::get('/tambah-jadwal', 'JadwalController@create')->name('tambah-jadwal');
    Route::post('/proses-tambah-jadwal', 'JadwalController@store')->name('proses-tambah-jadwal');
    Route::post('/show-jadwal/{jadwal}', 'JadwalController@edit')->name('show-jadwal');
    Route::patch('/proses-edit-jadwal', 'JadwalController@update')->name('proses-edit-jadwal');
    Route::delete('/hapus-jadwal/{jadwal}', 'JadwalController@destroy')->name('hapus-jadwal');
});
