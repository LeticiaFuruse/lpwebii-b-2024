<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Projeto;
use App\Models\Tarefa;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    //
    public function index(Request $request){
        $id = $request->input("id");
        $tarefa_unica = Tarefa::where('projeto_id', $id)->get();
        $projeto_all = Projeto::all();
        $projeto_unico = Projeto::where('id', $id)->first();
        $usuarios = Usuario::with('colaborador')->get();
        $colaborador_unico = Colaborador::with('tarefa')->get();

        return view('cliente.chat.index' , compact('tarefa_unica', 'projeto_all', 'projeto_unico', 'colaborador_unico' , 'usuarios'));
    }

    public function enviarMensagem(Request $request)
    {
        // Dados de Configuração
        $botToken = '7726012901:AAFQoz-PdGU2hxXp3ySOgMkE7K-zQAHfbl8'; // Substitua com o token do seu bot
        $chatId = '-4547283989'; // Substitua com o ID do seu grupo

        // Mensagem recebida do formulário
        $message = $request->input('message');

        // URL da API do Telegram
        $url = "https://api.telegram.org/bot{$botToken}/sendMessage";

        // Envio da Mensagem
        $response = Http::post($url, [
            'chat_id' => $chatId,
            'text' => $message
        ]);

        // Verificar a Resposta
        if ($response->ok()) {
            return back()->with('success', 'Mensagem enviada com sucesso!');
        } else {
            return back()->with('error', 'Erro ao enviar mensagem.');
        }
    }
}
