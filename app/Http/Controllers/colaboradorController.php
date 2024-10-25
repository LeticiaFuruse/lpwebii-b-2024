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
        $projeto = Projeto::with('usuario', "colaborador")->get();
        $usuarios = Usuario::all();

        return view('colaborador.index',compact('colaborador','usuario', 'projeto', 'usuarios'));
    }
    public function SalvarNovoColaborador(Request $request){
        $usuario_id = $request->input('usuario_id');
        $projeto_id = $request->input('projeto_id');
        $funcao = $request->input("funcao");

        $colaborador = new Colaborador();
        $colaborador->usuario_id = $usuario_id;
        $colaborador->projeto_id = $projeto_id;
        $colaborador->funcao = $funcao;
        $colaborador->save();

        return redirect('/colaborador');
    }
    public function AlterarColaborador($id){
        $colaborador = Colaborador::where("id", $id)->first();
        $usuarios = Usuario::all();
        $projeto = Projeto::all();

        return view('colaborador.alterar', compact('colaborador', 'usuarios', 'projeto'));
    }

    public function SalvarAlteracao(Request $request){
        $usuario_id = $request->input('usuario_id');
        $projeto_id = $request->input('projeto_id');
        $funcao = $request->input("funcao");
        
        $id = $request->input('id');

        $colaborador = Colaborador::where("id", $id)->first();
        $colaborador->usuario_id = $usuario_id;
        $colaborador->projeto_id = $projeto_id;
        $colaborador->funcao = $funcao;
        $colaborador->save();

        return redirect('/colaborador');
    }
    public function ExcluirColaborador($id){
        $colaborador = Colaborador::where("id", $id)->first();
        $colaborador->delete();
        return redirect('/colaborador');
    }
}
