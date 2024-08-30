<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('quem-somos/', function () {
    return view('quem-somos.hiatoria');
});

Route::get('produtos/', function () {
    echo "Nossos produtos";
});

/* URL Base 127.0.0.1:8000 */




