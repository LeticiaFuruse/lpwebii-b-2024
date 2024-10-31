<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Projeto;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class metaclienteController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input("id");
        $meta_unica = Meta::where('projeto_id', $id)->get();
        $projeto_all = Projeto::all();
        $projeto_unico = Projeto::where('id', $id)->first();
        $tarefa_unica = Tarefa::with('meta')->get();
        $tarefa_all = Tarefa::all();

        return view('cliente.metas.index', compact('meta_unica', 'projeto_all', 'projeto_unico', 'tarefa_unica', 'tarefa_all'));
    }
    public function ExcluirMeta($id)
    {
        $meta = Meta::find($id);

        if ($meta) {
            $projetoId = $meta->projeto_id; // Armazena o ID do projeto
            $meta->delete(); // Exclui a meta
        }

        // Redireciona de volta para a página de metas do projeto, passando o ID do projeto
        return redirect()->route('meta-cliente', ['id' => $projetoId])->with('success', 'Meta excluída com sucesso!');
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
        $id = $request->input('id');
        $meta_titulo = $request->input('meta_titulo');
        $meta_descricao = $request->input('meta_descricao');
        $meta_status = $request->input('meta_status');
        $meta_prazo = $request->input('meta_prazo');
        $tarefa_ids = $request->input('tarefa_id');
        $projeto_id = $request->input('projeto_id');

        $meta = Meta::find($id);

        if ($meta) {
            $meta->meta_titulo = $meta_titulo;
            $meta->projeto_id = $projeto_id;
            $meta->meta_descricao = $meta_descricao;
            $meta->meta_status = $meta_status;
            $meta->meta_prazo = $meta_prazo;

            $meta->save();

            // Atualizar o meta_id nas tarefas associadas
            foreach ($tarefa_ids as $tarefa_id) {
                $tarefa = Tarefa::find($tarefa_id);
                if ($tarefa) {
                    $tarefa->meta_id = $meta->id; // associa a tarefa à meta
                    $tarefa->save();
                }
            }

            return redirect()->route('meta-cliente', ['id' => $projeto_id])->with('success', 'Meta alterada com sucesso!');
        }

        return redirect()->back()->with('error', 'Meta não encontrada!');
    }
    public function SalvarNovaMeta(Request $request)
    {
        $meta_titulo = $request->input('meta_titulo');
        $meta_descricao = $request->input('meta_descricao');
        $meta_status = $request->input('meta_status');
        $meta_prazo = $request->input('meta_prazo');
        $tarefa_ids = $request->input('tarefa_id');
        $projeto_id = $request->input('projeto_id');

        $meta = new Meta();

        if ($meta) {
            $meta->meta_titulo = $meta_titulo;
            $meta->projeto_id = $projeto_id;
            $meta->meta_descricao = $meta_descricao;
            $meta->meta_status = $meta_status;
            $meta->meta_prazo = $meta_prazo;

            $meta->save();

        if ($tarefa_ids) {
            // Atualizar o meta_id nas tarefas associadas
            foreach ($tarefa_ids as $tarefa_id) {
                $tarefa = Tarefa::find($tarefa_id);
                if ($tarefa) {
                    $tarefa->meta_id = $meta->id; // associa a tarefa à meta
                    $tarefa->save();
                }
            }
        }
            return redirect()->route('meta-cliente', ['id' => $projeto_id])->with('success', 'Meta alterada com sucesso!');
        }
    }
}
