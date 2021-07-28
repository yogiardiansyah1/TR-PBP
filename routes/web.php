<?php

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

# control view
Route::get('/dashboard', 'view_control@index');

# control produk
Route::get('/produk', 'produk_control@index');
Route::get('/produk/tambah', 'produk_control@tambah');
Route::post('/produk/tambah/query', 'produk_control@insert');
Route::post('/produk/cari', 'produk_control@cari');
Route::get('/produk/hapus/{id}', 'produk_control@delete');
Route::post('/produk/edit/simpan/{id}', 'produk_control@simpan');
Route::get('/produk/edit/{id}', 'produk_control@edit');

# control admin
Route::get('/admin/login', 'admin_control@login');
Route::get('/admin/logout', 'admin_control@logout');
Route::post('/admin/login/cek', 'admin_control@login_cek');

# control keranjang
Route::post('/keranjang/tambah/{id}', 'keranjang_control@tambah');
Route::post('/keranjang/checkout/{total}', 'keranjang_control@checkout');

# control transaksi
Route::get('/transaksi', 'transaksi_control@index');
Route::get('/transaksi/{id}', 'transaksi_control@detail');