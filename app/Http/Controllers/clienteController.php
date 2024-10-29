<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    public function index(){
        $projeto_all = Projeto::all();
        return view('cliente.index', compact('projeto_all'));
    }
}
