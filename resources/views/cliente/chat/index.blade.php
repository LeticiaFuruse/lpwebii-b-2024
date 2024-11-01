@extends('cliente.index')

@section('conteudo')

<div class="container mt-4">
    <div class="card shadow-lg rounded">
        <div class="card-header text-center bg-primary text-white">
            <h2 class="mb-0">Enviar Mensagem ao Administrador</h2>
        </div>
        <div class="card-body">
            <!-- Mostrar Mensagem de Sucesso ou Erro -->
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Formulário para Enviar a Mensagem -->
            <form action="{{ route('enviarMensagem') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="message">Mensagem:</label>
                    <textarea name="message" class="form-control" rows="4" placeholder="Digite sua mensagem e seu nome de usuário"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Enviar Mensagem</button>
            </form>
        </div>
    </div>
</div>

@endsection