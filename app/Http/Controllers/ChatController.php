<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Projeto;
use App\Models\Tarefa;
use App\Models\Usuario;
use Kreait\Firebase\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    protected $database;

    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount(storage_path('app/taskhubchat-firebase-adminsdk-nfu6t-ee7ebdc6f7.json'))
        ->withDatabaseUri('https://taskhubchat-default-rtdb.firebaseio.com//');
        $this->database = $factory->createDatabase();
    }

    public function index(Request $request)
    {
        $id = $request->input("id");
        $tarefa_unica = Tarefa::where('projeto_id', $id)->get();
        $projeto_all = Projeto::all();
        $projeto_unico = Projeto::where('id', $id)->first();
        $usuarios = Usuario::with('colaborador')->get();
        $colaborador_unico = Colaborador::with('tarefa')->get();
        $messages = $this->database->getReference('messages')->getValue() ?? [];

        return view('cliente.chatFirebase.index', compact('messages' , 'tarefa_unica', 'projeto_all', 'projeto_unico', 'colaborador_unico' , 'usuarios'));
    }

    public function store(Request $request)
    {
        $this->database->getReference('messages')->push([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'created_at' => now()->toISOString(),
        ]);

        return redirect()->route('chatFirebase.index', ['id' => $request->projeto_id]);
    }

}
