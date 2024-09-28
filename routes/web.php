<?php

use App\Http\Controllers\CategoriaController;
use App\Models\Categoria;
use Illuminate\Support\Facades\Route;


Route::get("/",  function(){
    return view("admin_template.index");
    
});

Route::get("/categoria", [CategoriaController::class , "index"]);
Route::post("/categoria" , [CategoriaController::class ,"SalvarNovaCategoria"]);

Route::get('/categoria/upd/{id}' , [CategoriaController::class, 'BuscaAlterar']) -> name('cat_alterar');

Route::get('/categoria/exc/{id}' , [CategoriaController::class , "ExcluirCategoria"]) -> name('cat_excluir');

Route::post("/categoria/udp", [CategoriaController::class, "SalvarAlteracao"])->name('cat_alt_salva');


// Route::get("/produto", function(){
//     return view("produto.index");
// });

