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
}
