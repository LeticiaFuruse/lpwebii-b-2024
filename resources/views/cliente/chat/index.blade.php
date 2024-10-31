
@extends('cliente.index')

@section('conteudo')

<div class="container mt-4">
    <h2 class="text-center mb-4">Enviar Mensagem para o Grupo</h2>

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
            <textarea name="message" class="form-control" rows="4" placeholder="Digite sua mensagem..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Enviar Mensagem</button>
    </form>
</div>
@endsection