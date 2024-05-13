<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/lowongan', function () {
    return view('lowongan');
});
Route::get('/perusahaan', function () {
    return view('perusahaan');
});

