<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cargoController;

Route::get("/",  function(){
    return view("admin_template.index");
    
});

//rota que chama o index do CARGO
Route::get("/cargo" , [cargoController::class, 'index']);
Route::get("/cargo" , [cargoController::class, 'index'])->name("cargo_alterar");

