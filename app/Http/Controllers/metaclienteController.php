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

        return view('cliente.metas.index', compact('meta_unica', 'projeto_all', 'projeto_unico'));
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
        // Verifique se a requisição é GET
        if ($request->isMethod('get')) {
            // Redirecione para a rota POST com os dados necessários
            return redirect()->route('meta-cliente-alt-salva', ['id' => $request->input('id')])
                ->withInput($request->except('_token'));
        }

        // O restante da lógica para a atualização
        $meta_titulo = $request->input('meta_titulo');
        $meta_descricao = $request->input('meta_descricao');
        $meta_status = $request->input('meta_status');
        $meta_prazo = $request->input('meta_prazo');
        $projeto_id = $request->input('projeto_id');
        $id = $request->input('id');

        $meta = Meta::find($id);

        if ($meta) {
            $meta->meta_titulo = $meta_titulo;
            $meta->projeto_id = $projeto_id;
            $meta->meta_descricao = $meta_descricao;
            $meta->meta_status = $meta_status;
            $meta->meta_prazo = $meta_prazo;

            $meta->save();

            return redirect()->route('meta-cliente', ['id' => $projeto_id])->with('success', 'Meta alterada com sucesso!');
        }

        return redirect()->back()->with('error', 'Meta não encontrada!');
    }
}
