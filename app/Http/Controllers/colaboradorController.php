<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use App\Models\Colaborador;
use App\Models\Projeto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class colaboradorController extends Controller
{
    public function index(){
        $colaborador = Colaborador::with('projeto', 'usuario')->get();
        $usuario = Usuario::with('cargo', 'colaborador')->get();

        return view('colaborador.index',compact('colaborador','usuario'));
    }
    public function SalvarNovoColaborador(Request $request){
        $usuario_id = $request->input('usuario_id');
        $colaborador_nome = $request->input('colaborador_nome');
        $colaborador_data_admissao = $request->input('colaborador_data_admissao');
    }
}
