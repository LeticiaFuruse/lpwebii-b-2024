<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class projetoController extends Controller
{
    public function index(){
        $projeto = Projeto::with(['usuario', 'meta.tarefa'])->get();
        $usuarios = Usuario::all();
        
        return view('projeto.index', compact('projeto', 'usuarios'));
    }
    public function SalvarNovoProjeto(Request $request){
        $projeto_nome = $request->input('projeto_nome');
        $usuario_id = $request->input('usuario_id');
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
        return redirect('/projeto');
    }
    public function AlterarProjeto($id){
        $projeto = Projeto::where("id", $id)->first();
        $usuarios = Usuario::with('projeto')->get();
        return view('projeto.alterar', compact('projeto', 'usuarios'));
    }

    public function SalvarAlteracao(Request $request){
        $projeto_nome = $request->input("projeto_nome");
        $usuario_id = $request->input("usuario_id");
        $projeto_descricao = $request->input("projeto_descricao");
        $projeto_status = $request->input("projeto_status");
        $projeto_data_inicio = $request->input("projeto_data_inicio");
        $projeto_data_fim = $request->input("projeto_data_fim");
        $id = $request->input("id");

        $projeto = Projeto::where("id", $id)->first();

        $projeto->projeto_nome = $projeto_nome;
        $projeto->projeto_descricao = $projeto_descricao;
        $projeto->projeto_status = $projeto_status;
        $projeto->projeto_data_inicio = $projeto_data_inicio;
        $projeto->projeto_data_fim = $projeto_data_fim;
    
        $projeto->save();
        $projeto->usuario()->sync   ($usuario_id);
        return redirect('/projeto');
        
    }

    public function ExcluirProjeto($id){
        $projeto_excluir = Projeto::where("id", $id)->first();

        $projeto_excluir->delete();
        return redirect('/projeto');
    }
   
}
