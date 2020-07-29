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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
Route::get('atasan/home', 'HomeController@atasanHome')->name('atasan.home')->middleware('is_atasan');
Route::prefix('admin/home/admin/')->group(function(){
  Route::get('/', 'UserController@indexAdmin')->name('admin.index');
  Route::get('create', 'UserController@createAdmin')->name('admin.create');
  Route::post('store', 'UserController@storeAdmin')->name('admin.store');
  Route::get('edit/{id}', 'UserController@editAdmin')->name('admin.edit');
  Route::post('update', 'UserController@updateAdmin')->name('admin.update');
  Route::post('delete/{id}', 'UserController@deleteAdmin')->name('admin.delete');
});
Route::prefix('admin/home/atasan/')->group(function(){
  Route::get('/', 'UserController@indexAtasan')->name('atasan.index');
  Route::get('create', 'UserController@createAtasan')->name('atasan.create');
  Route::post('store', 'UserController@storeAtasan')->name('atasan.store');
  Route::get('edit/{id}', 'UserController@editAtasan')->name('atasan.edit');
  Route::post('update', 'UserController@updateAtasan')->name('atasan.update');
  Route::post('delete/{id}', 'UserController@deleteAtasan')->name('atasan.delete');
});
Route::prefix('admin/home/pegawai/')->group(function(){
  Route::get('/', 'UserController@indexPegawai')->name('pegawai.index');
  Route::get('create', 'UserController@createPegawai')->name('pegawai.create');
  Route::post('store', 'UserController@storePegawai')->name('pegawai.store');
  Route::get('edit/{id}', 'UserController@editPegawai')->name('pegawai.edit');
  Route::post('update', 'UserController@updatePegawai')->name('pegawai.update');
  Route::post('delete/{id}', 'UserController@deletePegawai')->name('pegawai.delete');
});
Route::prefix('admin/home/jadwal')->group(function(){
  Route::get('/','JadwalController@indexSetJadwal')->name('jadwal.setjadwal');
  Route::post('/store','JadwalController@storeJadwal')->name('jadwal.store');
  Route::post('/cek/{id}','JadwalController@cek');
  Route::post('/detail/{id}','JadwalController@jadwaluser');
});
Route::prefix('atasan/home/jadwal')->group(function(){
  Route::get('/','JadwalController@indexSetJadwal')->name('jadwal.setjadwalAtasan');
  Route::post('/store','JadwalController@storeJadwal')->name('jadwal.storeAtasan');
  Route::post('/cek/{id}','JadwalController@cek');
  Route::post('/detail/{id}','JadwalController@jadwaluser');
});
