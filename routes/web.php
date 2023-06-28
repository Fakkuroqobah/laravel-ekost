<?php

Route::get('/', function () {
    return view('landing.utama');
})->name('root');

Route::middleware(['guest'])->group(function () {
    // users
    Route::get('/login', 'AuthController@getLogin')->name('login');
    Route::post('/login', 'AuthController@postLogin')->name('post.login');
    Route::get('/register', 'AuthController@getRegister')->name('register');
    Route::post('/register', 'AuthController@postRegister')->name('post.register');

    // pemilik kos
    Route::get('/register-pemilik', 'AuthController@registerPemilik')->name('register.pemilik');
    Route::get('/login-pemilik', 'AuthController@getLoginPemilik')->name('login.pemilik');
    Route::post('/register-pemilik', 'AuthController@postRegisterPemilik')->name('post.register.pemilik');
    Route::post('/login-pemilik', 'AuthController@postLoginPemilik')->name('post.login.pemilik');

    // admin
    Route::get('/login-admin', 'AuthController@getLoginAdmin')->name('login.admin');
    Route::post('/login-admin', 'AuthController@postLoginAdmin')->name('post.login.admin');
});

Route::get('/logout', 'AuthController@logout')->name('logout');

// cari kos
Route::get('/cari', 'PageController@auto')->name('auto');
Route::get('/search', 'PageController@search')->name('search');
Route::get('/detail/{id}', 'PageController@detail')->name('detail');


// user
Route::middleware(['auth'])->group(function () {
    Route::post('/pesan/{id}', 'PageController@pesan')->name('pesan');
    Route::post('/booking/{id}', 'PageController@booking')->name('booking');
    Route::get('/pemesanan/{id}', 'PageController@pemesanan')->name('pemesanan');
    Route::put('/pemesanan/checkout/{id}', 'PageController@pemesananCheckout')->name('pemesanan.pemesananCheckout');
    Route::delete('/pemesanan/hapus-booking/{id}', 'PageController@hapusBooking')->name('pemesanan.hapus');
    Route::delete('/delete-booking-kos/{id}', 'PageController@hapusPermanenBooking')->name('delete.permanen.booking');
});

// pemilik kos
// Route::middleware(['role'])->group(function () {
    Route::get('/dashboard', 'PemilikController@index')->name('dash.pemilik');
    Route::get('/tambah-kos', 'PemilikController@getKos')->name('get.kos');
    Route::post('/tambah-kos', 'PemilikController@postKos')->name('post.kos');
    Route::get('/detail-kos', 'PemilikController@detailKos')->name('get.detail.kos');
    Route::get('/edit-kos/{id}', 'PemilikController@editKos')->name('get.edit.kos');
    Route::post('/edit-kos/{id}', 'PemilikController@updateKos')->name('post.update.kos');
    Route::delete('/hapus-kos/{id}', 'PemilikController@deleteKos')->name('delete.kos');
    Route::get('/pesan-kos', 'PemilikController@pesan')->name('pesan.kos');
    Route::delete('/hapus-pesan-kos/{id}', 'PemilikController@hapusPesan')->name('delete.pesan');
    Route::post('/hapus-pesan-kos-all', 'PemilikController@hapusPesanAll')->name('delete.pesanAll');
    Route::get('/booking-kos', 'PemilikController@booking')->name('get.booking.kos');
    Route::get('/aktiv-booking-kos/{id}', 'PemilikController@aktivBooking')->name('aktiv.booking');
    Route::delete('/hapus-booking-kos/{id}', 'PemilikController@hapusBooking')->name('delete.booking');
// });

// admin
// Route::middleware(['role'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('dash.admin');
    Route::get('/admin/permintaan', 'AdminController@permintaan')->name('permintaan');
    Route::get('/admin/users', 'AdminController@users')->name('admin.users');
    Route::get('/admin/aktifasi/{id}', 'AdminController@aktifasi')->name('aktifasi');
    Route::delete('/hapus-user/{id}', 'AdminController@hapusUser')->name('delete.user');
// });
