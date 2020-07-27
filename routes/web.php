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

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', 'Admin\AuthAdminController@showLogin')->name('admin.show.login');
    Route::post('/login', 'Admin\AuthAdminController@login')->name('admin.login');
    Route::post('/logout', 'Admin\AuthAdminController@logout')->name('admin.logout');
    Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

    Route::get('mahasiswa', 'Admin\MahasiswaController@index')->name('mahasiswa.index');
    Route::get('mahasiswa/create', 'Admin\MahasiswaController@create')->name('mahasiswa.create');
    Route::post('mahasiswa/create', 'Admin\MahasiswaController@store')->name('mahasiswa.store');
    Route::get('mahasiswa/edit/{id}', 'Admin\MahasiswaController@edit')->name('mahasiswa.edit');
    Route::patch('mahasiswa/update/{id}', 'Admin\MahasiswaController@update')->name('mahasiswa.update');
    Route::get('mahasiswa/destroy/{id}', 'Admin\MahasiswaController@destroy')->name('mahasiswa.destroy');
    Route::post('mahasiswa/import', 'Admin\MahasiswaController@import')->name('mahasiswa.import');

    Route::get('prodi', 'Admin\ProdiController@index')->name('prodi.index');
    Route::get('prodi/create', 'Admin\ProdiController@create')->name('prodi.create');
    Route::post('prodi/store', 'Admin\ProdiController@store')->name('prodi.store');
    Route::get('prodi/edit/{id}', 'Admin\ProdiController@edit')->name('prodi.edit');
    Route::patch('prodi/update/{id}', 'Admin\ProdiController@update')->name('prodi.update');
    Route::get('prodi/destroy/{id}', 'Admin\ProdiController@destroy')->name('prodi.destroy');

    Route::get('beasiswa', 'Admin\BeasiswaController@index')->name('beasiswa.index');
    Route::get('beasiswa/filter', 'Admin\BeasiswaController@filter')->name('beasiswa.filter');
    Route::get('beasiswa/detail/{id}', 'Admin\BeasiswaController@show')->name('beasiswa.detail');
    Route::get('beasiswa/report/{id}', 'Admin\BeasiswaController@pdf')->name('beasiswa.report');

    Route::get('kategori', 'Admin\KategoriController@index')->name('kategori.index');
    Route::post('kategori/store', 'Admin\KategoriController@store')->name('kategori.store');
    Route::post('kategori/edit/{id}', 'Admin\KategoriController@edit')->name('kategori.edit');
    Route::patch('kategori/update/{id}', 'Admin\KategoriController@update')->name('kategori.update');
    Route::get('kategori/destroy/{id}', 'Admin\KategoriController@destroy')->name('kategori.destroy');
    Route::get('export/excel', 'Admin\BeasiswaController@exportExcel')->name('admin.export-excel');

});
Route::group(['prefix' => 'prodi'], function () {

    Route::get('/login', 'Prodi\AuthProdiController@showLogin')->name('prodi.show.login');
    Route::post('/login', 'Prodi\AuthProdiController@login')->name('prodi.login');
    Route::post('/logout', 'Prodi\AuthProdiController@logout')->name('prodi.logout');
    Route::get('dashboard', 'Prodi\DashboardController@index')->name('prodi.dashboard');

    Route::get('mahasiswa', 'Prodi\MahasiswaController@index')->name('mahasiswas.index');

    Route::get('beasiswa', 'Prodi\BeasiswaController@index')->name('beasiswas.index');
    Route::post('beasiswa/tahun-akademik', 'Prodi\BeasiswaController@filterAkademik');
    Route::get('beasiswa/seleksi', 'Prodi\BeasiswaController@filter')->name('prodi.beasiswa.filter');
    Route::get('beasiswa/detail/{id}', 'Prodi\BeasiswaController@show')->name('beasiswas.detail');
    Route::patch('beasiswa/konfirmasi/{id}', 'Prodi\BeasiswaController@update')->name('beasiswa.konfirmasi');
    Route::patch('beasiswa/pembatalan/{id}', 'Prodi\BeasiswaController@edit')->name('beasiswa.pembatalan');

});

Route::group(['prefix' => 'mahasiswa'], function () {

    Route::get('/login', 'Mahasiswa\AuthMahasiswaController@showLogin')->name('mahasiswa.show.login');
    Route::post('/login', 'Mahasiswa\AuthMahasiswaController@login')->name('mahasiswa.login');
    Route::post('/logout', 'Mahasiswa\AuthMahasiswaController@logout')->name('mahasiswa.logout');
    Route::get('dashboard', 'Mahasiswa\DashboardController@index')->name('mahasiswa.dashboard');
    Route::get('detail', 'Mahasiswa\DetailController@index')->name('mahasiswa.detail');
    Route::post('detail/store', 'Mahasiswa\DetailController@store')->name('mahasiswas.store');

    Route::get('profile', 'Mahasiswa\ProfileController@index')->name('mahasiswa.profile');
    Route::get('edit/{id}', 'Mahasiswa\ProfileController@edit')->name('mahasiswas.edit');

    Route::get('password/{id}','Mahasiswa\PasswordController@change')->name('mahasiswa.changepassword');
    Route::put('password/update/{id}','Mahasiswa\PasswordController@update')->name('mahasiswa.updatepassword');

});
