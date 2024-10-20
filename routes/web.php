<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cargoController;
use App\Http\Controllers\usuarioController;

Route::get("/",  function(){
    return view("admin_template.index");
    
});

//rota que chama o index do CARGO
Route::get("/cargo" , [cargoController::class, 'index']);
Route::post("/cargo" , [cargoController::class, 'SalvarNovoCargo']);

Route::get("/cargo/upd/{id}" , [cargoController::class, 'AlterarCargo'])->name("cargo_alterar");
Route::get("/cargo/exc/{id}" , [cargoController::class, 'ExcluirCargo'])->name("cargo_excluir");
Route::post("/cargo/upd" , [cargoController::class, 'SalvarAlteracao'])->name("cargo_alt_salva");


//rota para Usuario
Route::get("/usuario", [usuarioController::class, 'index'])->name("usuario_index");
Route::post("/usuario", [usuarioController::class, 'SalvarNovoUsuario']);

Route::get("/usuario/upd/{id}" , [usuarioController::class, 'AlterarUsuario'])->name("usuario_alterar");
Route::get("/usuario/exc/{id}" , [usuarioController::class, 'ExcluirUsuario'])->name("usuario_excluir");
Route::post("/usuario/upd" , [usuarioController::class, 'SalvarAlteracao'])->name("usuario_alt_salva");
