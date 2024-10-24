<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cargoController;
use App\Http\Controllers\colaboradorController;
use App\Http\Controllers\metaController;
use App\Http\Controllers\projetoController;
use App\Http\Controllers\tarefaController;
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


//rota Projeto 
Route::get("/projeto", [projetoController::class, 'index'])->name("projeto_index");
Route::post("/projeto", [projetoController::class, 'SalvarNovoProjeto']);

Route::get("/projeto/upd/{id}" , [projetoController::class, 'AlterarProjeto'])->name("projeto_alterar");
Route::get("/projeto/exc/{id}" , [projetoController::class, 'ExcluirProjeto'])->name("projeto_excluir");
Route::post("/projeto/upd" , [projetoController::class, 'SalvarAlteracao'])->name("projeto_alt_salva");


//rota do Metas 
Route::get("/metas", [metaController::class, 'index'])->name("meta_index");
Route::post("/metas", [metaController::class, 'SalvarNovaMeta']);

Route::get("/metas/upd/{id}" , [metaController::class, 'AlterarMeta'])->name("meta_alterar");
Route::get("/metas/exc/{id}" , [metaController::class, 'ExcluirMeta'])->name("meta_excluir");
Route::post("/metas/upd" , [metaController::class, 'SalvarAlteracao'])->name("meta_alt_salva");


//rota Tarefas 
Route::get("/tarefa", [tarefaController::class, 'index'])->name("tarefa_index");
Route::post("/tarefa", [tarefaController::class, 'SalvarNovaTarefa']);

Route::get("/tarefa/upd/{id}", [tarefaController::class, 'AlterarTarefa'])->name("tarefa_alterar");
Route::get("/tarefa/exc/{id}", [tarefaController::class, 'ExcluirTarefa'])->name("tarefa_excluir");
Route::post("/tarefa/upd", [tarefaController::class, 'SalvarAlteracao'])->name("tarefa_alt_salva");

//rota Colaborador 
Route::get("/colaborador", [colaboradorController::class, 'index'])->name("colaborador_index");
Route::post("/colaborador", [colaboradorController::class, 'SalvarNovoColaborador']);

Route::get("/colaborador/upd/{id}", [colaboradorController::class, 'AlterarColaborador'])->name("colaborador_alterar");
Route::get("/colaborador/exc/{id}", [colaboradorController::class, 'ExcluirColaborador'])->name("colaborador_excluir");
Route::post("/colaborador/upd", [colaboradorController::class, 'SalvarAlteracao'])->name("colaborador_alt_salva");