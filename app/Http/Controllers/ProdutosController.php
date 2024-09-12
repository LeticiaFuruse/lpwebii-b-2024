<?php

namespace App\Http\Controllers;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index() {

        $dados = Produtos::all()->toArray();
        print_r($dados);
        exit;
    }
    public function novo() {
        $dados = new Produtos;
        $dados->prod_nome = 'sapato';
        $dados->prod_unidade = 25;
        $dados->save();

    }
}
