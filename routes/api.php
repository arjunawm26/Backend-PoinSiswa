<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', 'LoginController@login'); //Login

Route::group(['middleware' => ['jwt.verify']], function () {

    Route::get('login/check', "LoginController@LoginCheck"); //cek token
    Route::post('logout', "LoginController@logout"); //cek token

    //Beranda
	Route::get('beranda/statistik', 'BerandaController@statistik'); //statistik widget
	Route::get('beranda/poin_tertinggi', 'BerandaController@poinTertinggi'); //poin tertinggi

	//Petugas
	Route::get('petugas', "LoginController@index"); //read semua petugas
	Route::get('petugas/{limit}/{offset}', "LoginController@getAll"); //read dengan limit petugas
    Route::post('petugas', 'LoginController@store'); //create petugas
	Route::put('petugas/{id}', "LoginController@update"); //update petugas
	Route::delete('petugas/{id}', "LoginController@delete"); //delete petugas

	//Siswa
	Route::get('siswa', "SiswaController@index"); //read siswa
	Route::get('siswa/{limit}/{offset}', "SiswaController@getAll"); //read siswa
	Route::post('siswa', 'SiswaController@store'); //create siswa
	Route::put('siswa/{id}', "SiswaController@update"); //update siswa
	Route::delete('siswa/{id}', "SiswaController@delete"); //delete siswa

	//Pelanggaran
	Route::get('pelanggaran', "PelanggaranController@index"); //read pelanggaran
	Route::get('pelanggaran/{limit}/{offset}', "PelanggaranController@getAll"); //read pelanggaran
	Route::post('pelanggaran', 'PelanggaranController@store'); //create pelanggaran
	Route::put('pelanggaran/{id}', "PelanggaranController@update"); //update pelanggaran
	Route::delete('pelanggaran/{id}', "PelanggaranController@delete"); //delete pelanggaran

	//Kelola poin siswa
	Route::get('poin', "PoinController@index"); //read poin
	Route::get('poin/{limit}/{offset}', "PoinController@getAll"); //read poin
	Route::post('poin', 'PoinController@store'); //create poin
	Route::put('poin/{id}', "PoinController@update"); //update poin
	Route::delete('poin/{id}', "PoinController@delete"); //delete poin

	//Data Semua Poin Siswa
	Route::get('poin_siswa/{limit}/{offset}', 'PoinController@getPoinSiswaLimit');

	//Cari data poin siswa by nama
	Route::post('poin_siswa/{limit}/{offset}', 'PoinController@findPoinSiswa');

	//data detail poin per siswa
	Route::get('poin_siswa/{id}','PoinController@getDetailPoinSiswa');
});
