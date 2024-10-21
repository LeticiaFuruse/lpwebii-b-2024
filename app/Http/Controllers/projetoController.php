<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class projetoController extends Controller
{
    public function index(){
        $projeto = Projeto::with(['usuarios:id,usuario_nome'])->get();


        return view('projeto.index', compact('projeto'));
    }
}
