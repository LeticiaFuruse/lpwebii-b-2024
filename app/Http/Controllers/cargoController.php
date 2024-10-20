<?php

namespace App\Http\Controllers;

use App\Models\Cargos;

use Illuminate\Http\Request;

class cargoController extends Controller
{
    public function index()
    {
        $cargo = Cargos::all();
        return view('cargo.index', compact('cargo'));
    }
    public function SalvarNovoCargo(Request $request){
        $novo_cargo =  $request->input("cargo_nome");
        $novo_descricao =  $request->input("cargo_descricao");
        $cargo = New Cargos();
        $cargo->cargo_nome = $novo_cargo;
        $cargo->cargo_descricao = $novo_descricao;
        $cargo-> save();
        return redirect("/cargo");
    }

    public function ExcluirCargo($id){
        $excluir_cargo = Cargos::where("id", $id)->first();
        $excluir_cargo->delete();
        // $excluir_cargo->save();
        return redirect("/cargo")->with("success", "Cargo excluido com sucesso");

    }
    public function AlterarCargo($id){
        $alterarCargo = Cargos::where("id", $id)->first();
        return view("cargo.alterar", compact("alterarCargo"));

    }
    public function SalvarAlteracao(Request $request){
        $cargo_nome = $request->input("cargo_nome");
        $cargo_descricao = $request->input("cargo_descricao");
        $id = $request->input("id");
        $cargo = Cargos::where("id", $id)->first();
        $cargo->cargo_nome = $cargo_nome;
        $cargo->cargo_descricao = $cargo_descricao;
        $cargo->save();
        return redirect("/cargo");
    }
}
