<?php

use App\Http\Controllers\CategoriaController;
use App\Models\Categoria;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;


Route::get("/",  function(){
    return view("admin_template.index");
    
});
//Categoria
Route::get("/categoria", [CategoriaController::class , "index"]);
Route::post("/categoria" , [CategoriaController::class ,"SalvarNovaCategoria"]);
Route::get('/categoria/upd/{id}' , [CategoriaController::class, 'BuscaAlterar']) -> name('cat_alterar');
Route::get('/categoria/exc/{id}' , [CategoriaController::class , "ExcluirCategoria"]) -> name('cat_excluir');
Route::post("/categoria/udp", [CategoriaController::class, "SalvarAlteracao"])->name('cat_alt_salva');


//Produto
Route::get('/produto', [ProdutoController::class, 'index'])->name('produto_index');
Route::post('/produto', [ProdutoController::class, 'SalvarNovoProduto'])->name('produto_novo');
Route::get('/produto/exc/{id}' , [ProdutoController::class , "ExcluirProduto"]) -> name('prod_excluir');
Route::get('/produto/upd/{id}' , [ProdutoController::class, 'BuscaAlterar']) -> name('prod_alterar');
Route::post("/produto/udp", [ProdutoController::class, "SalvarAlteracao"])->name('prod_alt_salva');