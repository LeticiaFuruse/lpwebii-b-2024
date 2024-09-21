<?php

use App\Http\Controllers\CategoriaController;
use App\Models\Categoria;
use Illuminate\Support\Facades\Route;


Route::get("/",  function(){
    return view("admin_template.index");
    
});

Route::get("/categoria", [CategoriaController::class , "index"]);

Route::get("/produto", function(){
    return view("produto.index");
});

