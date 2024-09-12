<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//importar a categoria - igual arquivo do Models
use App\Models\Categorias;

class CategoriaController extends Controller
{
    //listagem inicial das categorias
    public function  index(){
        $cat = Categorias::all();
        return view("categoria.index" , compact('cat'));
    }
    //forms de criação de categoria
    public function form_novo(){

    }
    //salvar nova categoria 
    public function salvar_novo(){

    }
    //form de edição de categoria
    public function form_editar(){

    }
    //form de salvar a edição
    public function salvar_edit(){

    }
    //excluir categoria
    public function excluir(){

    }


}
