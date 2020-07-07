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


Route::get('/','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');



Route::group(['middleware' => ['auth','CheckRole:admin']], function () {
 
    Route::get('/user','UserController@index');
    Route::get('/user/{id}/edit','UserController@edit');
    Route::post('/user/{id}/update','UserController@update');
    Route::get('/user/{id}/destroy','UserController@destroy');

    Route::get('/anggota','AnggotaController@index');
    Route::get('/anggota/create','AnggotaController@create');
    Route::post('/anggota/store','AnggotaController@store');
    
  

    Route::get('/buku','BukuController@index');
    Route::get('/buku/create','BukuController@create');
    Route::post('/buku/store','BukuController@store');
    Route::get('/buku/{id}/edit','BukuController@edit');
    Route::post('/buku/{id}/update','BukuController@update');
    Route::get('/buku/{id}/destroy','BukuController@destroy');
    Route::get('/cetak/{id}/buku','BukuController@cetakbuku');

    Route::get('/transaksi','TransaksiController@index');
    Route::get('/transaksi/{id}/destroy','TransaksiController@destroy');

    
    
    Route::get('/laporan','LaporanController@index');
    Route::get('/laporan/transaksi','LaporanController@cetakTransaksi');
    Route::get('/laporan/buku','LaporanController@cetakBuku');
    Route::get('/laporan/anggota','LaporanController@cetakAnggota');
    
});

Route::group(['middleware' => ['auth','CheckRole:admin,anggota']], function () {

    Route::get('/dashboard','DashboardController@index');

    Route::get('/transaksi/create','TransaksiController@create');
    Route::post('/transaksi/store','TransaksiController@store');
    
    Route::post('/transaksi/{id}/update','TransaksiController@update');

    Route::get('/anggota/{id}/edit','AnggotaController@edit');
    Route::post('/anggota/{id}/update','AnggotaController@update');
    Route::get('/anggota/{id}/destroy','AnggotaController@destroy');
    Route::get('/cetak/{id}/kartuanggota','AnggotaController@cetakkartuanggota');

    Route::get('/password/{id}/edit','AuthController@gantipassword');
    Route::post('/postpassword/{id}','AuthController@postpassword');
   
   
});
