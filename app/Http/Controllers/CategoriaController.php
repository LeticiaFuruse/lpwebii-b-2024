<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //
    public function index(){
        //select * from categoria: 
        // $categorias = Categoria::all();
        $categorias = Categoria::where("cat_ativo", 1)->get();

        //controller chamando a view
        return view("categoria.index", compact("categorias"));
    }
    public function SalvarNovaCategoria(Request $request){
        $cat_nome = $request->input("cat_nome");
        $cat_descricao = $request->input('cat_descricao');
        
        // echo $cat_nome;
        $categoria = new Categoria();
        $categoria -> cat_nome =$cat_nome;
        $categoria -> cat_descricao = $cat_descricao;
        $categoria -> save();

        return redirect('/categoria');

    }
    public function ExcluirCategoria($id){
        // select * from categoria where id=1
        $categoria = Categoria::where("id", $id) -> first();
        $categoria -> cat_ativo = 0;
        $categoria->save();
        // update categoria set cat_ativo =0 where id=1

        return redirect("/categoria");
    }
    public function BuscaAlterar($id){
        $categoria = Categoria::where("id", $id)->first();

        return view('categoria.alterar', compact('categoria'));
    }

    public function SalvarAlteracao(Request $request){
        $nome = $request->input('cat_nome');
        $descricao = $request->input('cat_descricao');
        $id = $request->input('id');

        $categoria = Categoria::where('id' , $id)->first();
        $categoria -> cat_nome =$nome;
        $categoria -> cat_descricao =$descricao;
        $categoria->save();

        return redirect('/categoria');
    }
}
