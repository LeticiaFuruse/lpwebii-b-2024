<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use App\Models\Usuario;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function index(){
        $usuario = Usuario::with('cargo')->get();
        $cargo = Cargos::all();
        return view('usuario.index', compact('usuario', 'cargo'));
    }
    public function SalvarNovoUsuario(Request $request){
        $usuarioNome = $request->input('usuario_nome');
        $usuarioEmail = $request->input('usuario_email');
        $usuarioSenha = $request->input('usuario_senha');
        $cargoId = $request->input('cargo_id');

        $usuario = new Usuario();

        $usuario->usuario_nome = $usuarioNome;
        $usuario->usuario_email = $usuarioEmail;
        $usuario->usuario_senha = $usuarioSenha;
        $usuario->cargo_id = $cargoId;

        $usuario->save();
        return redirect('/usuario');
    }
    public function ExcluirUsuario($id){
        $usuario_excluir = Usuario::where("id", $id)->first();
        $usuario_excluir->delete();

        return redirect('/usuario');
    }
    public function AlterarUsuario($id){
        $usuario_alterar = Usuario::where("id", $id)->first();
        $cargo_alterar = Cargos::all();
        // $cargo_alterar = Cargos::where("id", $usuario_alterar->cargo_id)->get();

        return view('usuario.alterar', compact('usuario_alterar', 'cargo_alterar'));

    }
    public function SalvarAlteracao(Request $request){
        $usuario_nome = $request->input("usuario_nome");
        $usuario_email = $request->input("usuario_email");
        $usuario_senha = $request->input("usuario_senha");
        $cargo_id = $request->input("cargo_id");


        $id = $request->input("id");
        $usuario = Usuario::where("id", $id)->first();
        
        $usuario->usuario_nome = $usuario_nome;
        $usuario->usuario_email = $usuario_email;
        $usuario->usuario_senha = $usuario_senha;
        $usuario->cargo_id = $cargo_id;
        $usuario->save();
        return redirect("/usuario");
    }
}
