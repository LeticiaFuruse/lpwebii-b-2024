<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Projeto;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class metaController extends Controller
{
    public function index(){
        $projeto = Projeto::all();
        $meta = Meta::with('projeto')->get();
        $tarefa = Meta::with('tarefa')->get();
     
        return view('metas.index', compact('meta', 'projeto'));

    }
    public function SalvarNovaMeta(Request $request){
        $meta_titulo = $request->input('meta_titulo');
        $projeto_id = $request->input('projeto_id');
        $meta_descricao = $request->input('meta_descricao');
        $meta_status = $request->input('meta_status');
        $meta_prazo = $request->input('meta_prazo');
        
        $meta = new Meta();
        $meta->meta_titulo = $meta_titulo;
        $meta->projeto_id = $projeto_id;
        $meta->meta_descricao = $meta_descricao;
        $meta->meta_status = $meta_status;
        $meta->meta_prazo = $meta_prazo;
        $meta->save();

        $tarefa_id = $request->input('tarefa_id');

        // $meta->tarefa()->attach($tarefa_id);

        return redirect('/metas');

    }

}
