<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class novoprojetoController extends Controller
{
    public function index(Request $request){
        $projeto_nome = $request->input('projeto_nome');
        $usuario_id = Auth::user()->id;
        $projeto_descricao = $request->input('projeto_descricao');
        $projeto_status = $request->input('projeto_status');
        $projeto_data_inicio = $request->input('projeto_data_inicio');
        $projeto_data_fim = $request->input('projeto_data_fim');

        $projeto = new Projeto();
        $projeto->projeto_nome = $projeto_nome;
        
        $projeto->projeto_descricao = $projeto_descricao;
        $projeto->projeto_status = $projeto_status;
        $projeto->projeto_data_inicio = $projeto_data_inicio;
        $projeto->projeto_data_fim = $projeto_data_fim;
        $projeto->save();
        
        $projeto->usuario()->attach($usuario_id);
        return redirect('/novo-projeto');
    }
    public function AcessarPagina(){
        $projeto_all = Projeto::all();
        return view('cliente.novo-projeto.index', compact('projeto_all'));
    }
}
