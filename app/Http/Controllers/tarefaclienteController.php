<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Projeto;
use App\Models\Tarefa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class tarefaclienteController extends Controller
{
    public function index(Request $request){

        $id = $request->input("id");
        $tarefa_unica = Tarefa::where('projeto_id', $id)->get();
        $projeto_all = Projeto::all();
        $projeto_unico = Projeto::where('id', $id)->first();
        
        return view('cliente.tarefa.index', compact('tarefa_unica', 'projeto_all', 'projeto_unico'));
    }
}
