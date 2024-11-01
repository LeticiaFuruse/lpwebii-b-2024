<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Projeto;
use App\Models\Tarefa;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showRegisterForm()
    {
        return view('admin_template.register.index');
    }
    public function showLoginForm()
    {
        return view('admin_template.login.index');
    }
    public function register(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuario,usuario_email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criação do usuário
        $user = User::create([
            'usuario_nome' => $validatedData['name'],
            'usuario_email' => $validatedData['email'],
            'usuario_senha' => Hash::make($validatedData['password']),
        ]);

        // Autenticar o usuário
        Auth::login($user);

        // Redirecionar ou retornar uma resposta
        return redirect()->route("login")->with('success', 'Registro concluído com sucesso!');
    }
    public function login(Request $request)
    {
        // Validação dos dados
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Procurar o usuário no banco usando usu_email
        $user = User::where('usuario_email', $credentials['email'])->first();

        // Verificar se o usuário existe e se a senha está correta
        if ($user && Hash::check($credentials['password'], $user->usuario_senha)) {
            // Autenticar manualmente o usuário
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->route('cliente')->with('success', 'Login bem-sucedido!');
        }

        // Se as credenciais estiverem incorretas
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logout bem-sucedido!');
    }
    public function mostrarPerfil(Request $request)
    {
        $id = $request->input("id");
        $tarefa_unica = Tarefa::where('projeto_id', $id)->get();
        $projeto_all = Projeto::all();
        $projeto_unico = Projeto::where('id', $id)->first();
        $usuarios = Usuario::with('colaborador')->get();
        $colaborador_unico = Colaborador::with('tarefa')->get();
        
        $colaborador_all = Colaborador::where('projeto_id', $id)->with('usuario')->get();

        $usuario = Auth::user();

        return view('cliente.perfil.index', compact('usuario' , 'tarefa_unica', 'projeto_all', 'projeto_unico', 'colaborador_all' , 'colaborador_unico' , 'usuarios'));
    }
    public function atualizarDados(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'usuario_nome' => 'required|string|max:255',
            'usuario_email' => 'required|string|email|max:255|unique:usuario,usuario_email,',
            'usuario_senha' => 'nullable|string|min:8',
            'id' => 'required',

        ]);

        // Obter o usuário autenticado
        // $usuario = Auth::user();
        $usuario = Usuario::where('id', $request->input('id'))->first();


        // Atualizar dados do usuário
        $usuario->usuario_nome = $request->usuario_nome;
        $usuario->usuario_email = $request->usuario_email;

        // Atualizar a senha se foi fornecida
        if ($request->filled('usuario_senha')) {
            $usuario->usuario_senha = Hash::make($request->usuario_senha);
        }

        // Salvar as alterações no banco de dados
        
        $usuario->save();

        return redirect()->route('perfil')->with('success', 'Perfil atualizado com sucesso!');
    }
}
