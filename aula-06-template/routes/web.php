<?php

use Illuminate\Support\Facades\Route;

Route::get('/base', function () {
    return view('layout.base');
});

Route::get('/login', function () {
    return view('login.index');
});


Route::get('/registro', function () {
    return view('registro.index');
});

Route::get('/tasks', function () {
    return view('tasks.index');
});

Route::get('/404', function () {
    return view('404.index');
});

Route::get('/blank', function () {
    return view('blank.index');
});



