@extends('cliente.index')

@section('conteudo')
<div class="container mt-5">
    <h1 class="mb-4">Chat do Projeto</h1>

    <div id="messages" class="border rounded p-3 mb-4" style="max-height: 400px; overflow-y: auto;">
        @foreach($messages as $message)
            <div class="message mb-2">
                <strong class="text-primary">User {{$message['user_id']}}:</strong>
                <span class="badge badge-light ml-2">{{$message['content']}}</span>
            </div>
        @endforeach
    </div>

    <form action="{{ route('chat.store') }}" method="POST" class="d-flex">
        @csrf
        <input type="text" name="content" class="form-control mr-2" placeholder="Digite sua mensagem" required>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<!-- Scripts do Bootstrap e jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection