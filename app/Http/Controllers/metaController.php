<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Projeto;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class metaController extends Controller
{
    public function index()
    {
        $projeto = Projeto::all(); //para a tabela
        $meta = Meta::with('projeto')->get();
        $tarefa = Tarefa::with('meta')->get();
        $tarefa_all = Tarefa::all();
        return view('metas.index', compact('meta', 'projeto', 'tarefa', 'tarefa_all'));
    }
    public function SalvarNovaMeta(Request $request)
    {
        $meta_titulo = $request->input('meta_titulo');
        $meta_descricao = $request->input('meta_descricao');
        $meta_status = $request->input('meta_status');
        $meta_prazo = $request->input('meta_prazo');
        $projeto_id = $request->input('projeto_id');
        $meta = new Meta();
        $meta->meta_titulo = $meta_titulo;
        $meta->projeto_id = $projeto_id;
        $meta->meta_descricao = $meta_descricao;
        $meta->meta_status = $meta_status;
        $meta->meta_prazo = $meta_prazo;
        $meta->save();
        $tarefa_ids = $request->input('tarefa_id');
        if ($tarefa_ids) {
            foreach ($tarefa_ids as $tarefa_id) {
                if ($tarefa = Tarefa::find($tarefa_id)) {
                    $tarefa->meta_id = $meta->id;
                    $tarefa->save();
                }
            }
        }
        return redirect('/metas');
    }

    public function ExcluirMeta($id)
    {
        $meta_excluir = Meta::where("id", $id)->first();
        $meta_excluir->delete();
        return redirect('/metas');
    }

    public function AlterarMeta($id)
    {
        $meta = Meta::where("id", $id)->first();
        $projeto = Projeto::all();
        $tarefa = Tarefa::with('meta')->get();

        return view('metas.alterar', compact('meta', 'projeto', 'tarefa'));
    }

    public function SalvarAlteracao(Request $request)
    {
        $meta_titulo = $request->input('meta_titulo');
        $meta_descricao = $request->input('meta_descricao');
        $meta_status = $request->input('meta_status');
        $meta_prazo = $request->input('meta_prazo');
        $projeto_id = $request->input('projeto_id');

        $id = $request->input('id');
        $meta = Meta::where("id", $id)->first();

        $meta->meta_titulo = $meta_titulo;
        $meta->projeto_id = $projeto_id;
        $meta->meta_descricao = $meta_descricao;
        $meta->meta_status = $meta_status;
        $meta->meta_prazo = $meta_prazo;

        $meta->save();
        $tarefa_ids = $request->input('tarefa_id' , []);

        // Remover a associação da meta para todas as tarefas que não estão mais selecionadas
        Tarefa::where('meta_id', $meta->id)
            ->whereNotIn('id', $tarefa_ids)
            ->update(['meta_id' => null]);
        
        if (!empty($tarefa_ids)) {
            foreach ($tarefa_ids as $tarefa_id) {
                if ($tarefa = Tarefa::find($tarefa_id)) {
                    $tarefa->meta_id = $meta->id;
                    $tarefa->save();
                }
            }
        }

        
        return redirect('/metas');
    }
}
