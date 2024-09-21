<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //
    public function index(){
        //select * from categoria: 
        $categorias = Categoria::all();
        //vardump: dd($categorias);

        //controller chamando a view
        return view("categoria.index", compact("categorias"));

    }
}
