@extends('cliente.index')

@section('conteudo')
<div class="container mt-5">
    <div class="bg-white rounded shadow-sm p-4">
        <h1 class="mb-4 text-center">Chat do Projeto</h1>

        <div id="messages" class="border rounded p-3 mb-4" style="max-height: 400px; overflow-y: auto; background-color: #f8f9fa;">
            @foreach($messages as $message)
                <div class="message mb-2">
                    <strong class="text-primary">
                        {{ isset($usuarios[$message['user_id']]) ? $usuarios[$message['user_id']]->usuario_nome : 'Desconhecido' }}:
                    </strong>
                    <span class="badge badge-light ml-2">{{$message['content']}}</span>
                </div>
            @endforeach
        </div>

        <form action="{{ route('chat.store') }}" method="POST" class="d-flex">
            @csrf
            <input type="text" name="content" class="form-control mr-2" placeholder="Digite sua mensagem" required style="flex-grow: 1;">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

<!-- Scripts do Bootstrap e jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection