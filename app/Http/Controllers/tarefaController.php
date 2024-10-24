<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Projeto;
use App\Models\Tarefa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class tarefaController extends Controller
{
    public function index(){
        $tarefa = Tarefa::all(); //tabela
        $usuarios = Usuario::with('colaborador')->get();
        $projeto = Projeto::all(); //modal
        $colaborador_all = Colaborador::all();

        return view('tarefa.index', compact('tarefa', 'usuarios', 'projeto', 'colaborador_all'));
    }
    public function ExcluirTarefa($id){
        $tarefa = Tarefa::where("id", $id)->first();
        $tarefa->delete();
        return redirect('tarefa');
    }
    public function SalvarNovaTarefa(Request $request){
        $tarefa_titulo = $request->input('tarefa_titulo');
        $tarefa_descricao = $request->input('tarefa_descricao');
        $tarefa_status = $request->input('tarefa_status');
        $tarefa_data_conclusao = $request->input('tarefa_data_conclusao');  
        $projeto_id = $request->input('projeto_id');

        $tarefa = new Tarefa();
        $tarefa->tarefa_titulo = $tarefa_titulo;
        $tarefa->projeto_id = $projeto_id;
        $tarefa->tarefa_descricao = $tarefa_descricao;
        $tarefa->tarefa_status = $tarefa_status;
        $tarefa->tarefa_data_conclusao = $tarefa_data_conclusao;
        
        $tarefa->save();

        $colaborador_ids = $request->input('colaborador_id');
        $tarefa->colaborador()->attach($colaborador_ids);

        return redirect('tarefa');

    }
    public function AlterarTarefa($id){
        $tarefa = Tarefa::where("id", $id)->first();
        $colaborador_all = Colaborador::all();
        $usuarios = Usuario::with('colaborador')->get();
        $projeto = Projeto::all();
        return view('tarefa.alterar', compact('tarefa', 'colaborador_all', 'usuarios', 'projeto'));
        
    }
    public function SalvarAlteracao(Request $request){
        $tarefa_titulo = $request->input('tarefa_titulo');
        $tarefa_descricao = $request->input('tarefa_descricao');
        $tarefa_status = $request->input('tarefa_status');
        $tarefa_data_conclusao = $request->input('tarefa_data_conclusao');  
        $projeto_id = $request->input('projeto_id');

        $tarefa = Tarefa::where("id", $request->input('id'))->first();
        $tarefa->tarefa_titulo = $tarefa_titulo;
        $tarefa->projeto_id = $projeto_id;
        $tarefa->tarefa_descricao = $tarefa_descricao;
        $tarefa->tarefa_status = $tarefa_status;
        $tarefa->tarefa_data_conclusao = $tarefa_data_conclusao;
        
        $tarefa->save();

        $colaborador_ids = $request->input('colaborador_id');
        $tarefa->colaborador()->sync($colaborador_ids);

        return redirect('tarefa');
    }

}
