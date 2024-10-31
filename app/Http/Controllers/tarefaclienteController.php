<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Meta;
use App\Models\Projeto;
use App\Models\Tarefa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class tarefaclienteController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input("id");
        $tarefa_unica = Tarefa::where('projeto_id', $id)->get();
        $projeto_all = Projeto::all();
        $projeto_unico = Projeto::where('id', $id)->first();
        $usuarios = Usuario::with('colaborador')->get();
        $colaborador_unico = Colaborador::with('tarefa')->get();

        $colaborador_all = Colaborador::where('projeto_id', $id)->with('usuario', 'tarefa')->get();
        
        return view('cliente.tarefa.index', compact('tarefa_unica', 'projeto_all', 'projeto_unico', 'colaborador_all' , 'colaborador_unico' , 'usuarios'));
    }
    public function ExcluirTarefa($id){
        $tarefa = Tarefa::find($id);
        if ($tarefa) {
            $projetoId = $tarefa->projeto_id; // Armazena o ID do projeto
            $tarefa->delete(); // Exclui a meta
        }
        // Redireciona de volta para a página de metas do projeto, passando o ID do projeto
        return redirect()->route('tarefa-cliente', ['id' => $projetoId])->with('success', 'Tarefa excluída com sucesso!');
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

        return redirect()->route('tarefa-cliente', ['id' => $projeto_id] )->with('success', 'Tarefa alterada com sucesso!');
    }
    public function SalvarNovaTarefa(Request $request){

        $tarefa_titulo = $request->input('tarefa_titulo');
        $tarefa_descricao = $request->input('tarefa_descricao');
        $tarefa_status = $request->input('tarefa_status');
        $tarefa_data_conclusao = $request->input('tarefa_data_conclusao');
        $tarefa_ids = $request->input('tarefa_id');
        $projeto_id = $request->input('projeto_id');
        $colaborador_ids = $request->input('colaborador_id');

        $tarefa = new Tarefa();

        if ($tarefa) {
            $tarefa->tarefa_titulo = $tarefa_titulo;
            $tarefa->projeto_id = $projeto_id;
            $tarefa->tarefa_descricao = $tarefa_descricao;
            $tarefa->tarefa_status = $tarefa_status;
            $tarefa->tarefa_data_conclusao = $tarefa_data_conclusao;
            
            $tarefa->save();

            $colaborador_ids = $request->input('colaborador_id');
            $tarefa->colaborador()->attach($colaborador_ids);

        if ($tarefa_ids) {
            // Atualizar o tarefa_id nas tarefas associadas
            foreach ($tarefa_ids as $tarefa_id) {
                $tarefa = Tarefa::find($tarefa_id);
                if ($tarefa) {
                    $tarefa->tarefa_id = $tarefa->id; // associa a tarefa à tarefa
                    $tarefa->save();
                }
            }
        }
            return redirect()->route('tarefa-cliente', ['id' => $projeto_id])->with('success', 'tarefa criada com sucesso!');
        }
    }
}
