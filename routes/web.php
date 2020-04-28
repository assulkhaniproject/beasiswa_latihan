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
    return view('welcome');});


Route::group(['prefix' => 'admin'], function (){

    Route::get('/login','admin\AuthAdminController@showLogin')->name('admin.show.login');
    Route::post('/login','admin\AuthAdminController@login')->name('admin.login');
    Route::post('/logout','admin\AuthAdminController@logout')->name('admin.logout');
    Route::get('dashboard', 'admin\DashboardController@index')->name('admin.dashboard');

   Route::get('mahasiswa', 'admin\MahasiswaController@index')->name('mahasiswa.index');
   Route::get('mahasiswa/create', 'admin\MahasiswaController@create')->name('mahasiswa.create');

   Route::get('prodi', 'admin\ProdiController@index')->name('prodi.index');
   Route::get('prodi/create','admin\ProdiController@create')->name('prodi.create');
   Route::post('prodi/store', 'admin\ProdiController@store')->name('prodi.store');
   Route::get('prodi/edit/{id}','admin\ProdiController@edit')->name('prodi.edit');
   Route::patch('prodi/update/{id}','admin\ProdiController@update')->name('prodi.update');
   Route::get('prodi/destroy/{id}','admin\ProdiController@destroy')->name('prodi.destroy');

   Route::get('beasiswa','admin\BeasiswaController@index')->name('beasiswa.index');

});
Route::group(['prefix' => 'prodi'], function (){

    Route::get('/login', 'prodi\AuthProdiController@showLogin')->name('prodi.show.login');
    Route::post('/login', 'prodi\AuthProdiController@login')->name('prodi.login');
    Route::post('/logout', 'prodi\AuthProdiController@logout')->name('prodi.logout');
    Route::get('dashboard', 'prodi\DashboardController@index')->name('prodi.dashboard');

    Route::get('mahasiswa', 'prodi\MahasiswaController@index')->name('mahasiswas.index');

});

Route::group(['prefix' => 'mahasiswa'], function (){

    Route::get('/login', 'mahasiswa\AuthMahasiswaController@showLogin')->name('mahasiswa.show.login');
    Route::post('/login', 'mahasiswa\AuthMahasiswaController@login')->name('mahasiswa.login');
    Route::post('/logout', 'mahasiswa\AuthMahasiswaController@logout')->name('mahasiswa.logout');
    Route::get('dashboard', 'mahasiswa\DashboardController@index')->name('mahasiswa.dashboard');

});
