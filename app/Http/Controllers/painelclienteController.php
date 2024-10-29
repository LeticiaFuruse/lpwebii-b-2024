<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Meta;
use App\Models\Projeto;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class painelclienteController extends Controller
{
    public function index(Request $request){
        $projeto_all = Projeto::all();
        $id = $request->input("id");
        $projeto_unico = Projeto::where("id", $id)->first();
        $meta_count = Meta::where('projeto_id', $id)->count();
        $colaborador_count = Colaborador::where('projeto_id', $id)->count();
        $tarefas_count = Tarefa::where('projeto_id', $id)->count();

        return view('cliente.painel.index', compact('projeto_all', 'projeto_unico', 'meta_count' , 'colaborador_count', 'tarefas_count'));
    }
}
