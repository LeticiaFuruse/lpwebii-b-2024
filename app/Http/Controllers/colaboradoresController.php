<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Projeto;
use App\Models\Tarefa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class colaboradoresController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input("id");
        $tarefa_unica = Tarefa::where('projeto_id', $id)->get();
        $projeto_all = Projeto::all();
        $projeto_unico = Projeto::where('id', $id)->first();
        $usuarios = Usuario::with('colaborador')->get();
        $colaborador_unico = Colaborador::with('tarefa')->get();
        // Buscar todos os usuários
        $usuarios = Usuario::all();

        return view('cliente.colaboradores.index', compact('usuarios' , 'tarefa_unica', 'projeto_all', 'projeto_unico', 'colaborador_unico'));
    }
}
