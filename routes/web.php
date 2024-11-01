<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cargoController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\colaboradorController;
use App\Http\Controllers\colaboradoresController;
use App\Http\Controllers\metaclienteController;
use App\Http\Controllers\metaController;
use App\Http\Controllers\novoprojetoController;
use App\Http\Controllers\painelclienteController;
use App\Http\Controllers\painelController;
use App\Http\Controllers\projetoController;
use App\Http\Controllers\tarefaclienteController;
use App\Http\Controllers\tarefaController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\usuarioController;
// admin
Route::get("/",  function () {
    return view("admin_template.register.index");
});
Route::get("/administrador",  function () {
    return view("admin_template.index");
})->name('administrador');


//telegram 
Route::get('/mensagem-cliente', [TelegramController::class, 'index'])->name('mensagem-cliente');
Route::post('/enviar-mensagem', [TelegramController::class, 'enviarMensagem'])->name('enviarMensagem');


//rota de register do usuario 
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post("/register", [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    // index cliente
    Route::get("/cliente", [clienteController::class, 'index'])->name('cliente');
    //painel
    Route::get("/painel", [painelclienteController::class, 'index'])->name('painel-cliente');
    //meta
    Route::get("/meta", [metaclienteController::class, 'index'])->name('meta-cliente');
    Route::get("/meta/exc/{id}", [metaclienteController::class, 'ExcluirMeta'])->name('meta-cliente-excluir');
    Route::post("/meta-cliente/upd", [metaclienteController::class, 'SalvarAlteracao'])->name("meta-cliente-alt-salva");
    Route::post("/meta-cliente-salvar", [metaclienteController::class, 'SalvarNovaMeta'])->name('meta-cliente-salvar-novo');
    //  meta cliente 
    Route::get("/meta-cliente",  function () {
        return view("cliente.metas.index");
    });

    //tarefa 
    Route::get("/tarefa-cliente", [tarefaclienteController::class, 'index'])->name('tarefa-cliente');
    Route::get("/tarefa-cliente/exc/{id}", [tarefaclienteController::class, 'ExcluirTarefa'])->name('tarefa-cliente-excluir');
    Route::get("/tarefa-cliente/upd/{id}", [tarefaclienteController::class, 'AlterarTarefa'])->name('tarefa-cliente-alterar');
    Route::post("/tarefa-cliente", [tarefaclienteController::class, 'SalvarAlteracao'])->name("tarefa-cliente-alt-salva");
    Route::post("/tarefa-cliente-salvar", [tarefaclienteController::class, 'SalvarNovaTarefa'])->name('tarefa-cliente-salvar-novo');

    // novo projeto 
    Route::get("/novo-projeto",  function () {
        return view("cliente.novo-projeto.index");
    })->name('novo-projeto');
    Route::post('/novo-projeto', [novoprojetoController::class, 'index']);
    Route::get('/novo-projeto', [novoprojetoController::class, 'AcessarPagina'])->name('novo-projeto');

    //colaboradores cliente
    Route::get('/colaboradores', [colaboradoresController::class, 'index'])->name('colaboradores.index');
    
    //perfil do cliente 
    Route::get('/perfil', [AuthController::class, 'mostrarPerfil'])->name('perfil');
    Route::put('/perfil-atualizar', [AuthController::class, 'atualizarDados'])->name('usuario.atualizar');
























    //logout do admin
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::post('/logout', [AuthController::class, 'login']);

    //rota que chama o index do CARGO
    Route::get("/cargo", [cargoController::class, 'index']);
    Route::post("/cargo", [cargoController::class, 'SalvarNovoCargo']);

    Route::get("/cargo/upd/{id}", [cargoController::class, 'AlterarCargo'])->name("cargo_alterar");
    Route::get("/cargo/exc/{id}", [cargoController::class, 'ExcluirCargo'])->name("cargo_excluir");
    Route::post("/cargo/upd", [cargoController::class, 'SalvarAlteracao'])->name("cargo_alt_salva");


    //rota para Usuario
    Route::get("/usuario", [usuarioController::class, 'index'])->name("usuario_index");
    Route::post("/usuario", [usuarioController::class, 'SalvarNovoUsuario']);

    Route::get("/usuario/upd/{id}", [usuarioController::class, 'AlterarUsuario'])->name("usuario_alterar");
    Route::get("/usuario/exc/{id}", [usuarioController::class, 'ExcluirUsuario'])->name("usuario_excluir");
    Route::post("/usuario/upd", [usuarioController::class, 'SalvarAlteracao'])->name("usuario_alt_salva");


    //rota Projeto 
    Route::get("/projeto", [projetoController::class, 'index'])->name("projeto_index");
    Route::post("/projeto", [projetoController::class, 'SalvarNovoProjeto']);

    Route::get("/projeto/upd/{id}", [projetoController::class, 'AlterarProjeto'])->name("projeto_alterar");
    Route::get("/projeto/exc/{id}", [projetoController::class, 'ExcluirProjeto'])->name("projeto_excluir");
    Route::post("/projeto/upd", [projetoController::class, 'SalvarAlteracao'])->name("projeto_alt_salva");


    //rota do Metas 
    Route::get("/metas", [metaController::class, 'index'])->name("meta_index");
    Route::post("/metas", [metaController::class, 'SalvarNovaMeta']);

    Route::get("/metas/upd/{id}", [metaController::class, 'AlterarMeta'])->name("meta_alterar");
    Route::get("/metas/exc/{id}", [metaController::class, 'ExcluirMeta'])->name("meta_excluir");
    Route::post("/metas/upd", [metaController::class, 'SalvarAlteracao'])->name("meta_alt_salva");


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
});
