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
        $colaborador = Colaborador::with('projeto', 'usuario')->get();

        // Buscar todos os usuários
        $usuarios = Usuario::all();

        return view('cliente.colaboradores.index', compact('usuarios' , 'tarefa_unica', 'projeto_all', 'projeto_unico', 'colaborador'));
    }
    public function SalvarNovoColaborador(Request $request){
        
        $projeto_id = $request->input('projeto_id');
        $usuario_id = $request->input('usuario_id');
        $funcao = $request->input("funcao");

        $colaborador = new Colaborador();
        $colaborador->projeto_id = $projeto_id;
        $colaborador->usuario_id = $usuario_id;
        $colaborador->funcao = $funcao;
        $colaborador->colaborador_data_admissao = now();
        $colaborador->save();

        return redirect()->route('colaboradores.index', ['id' => $projeto_id]);

    }
}
