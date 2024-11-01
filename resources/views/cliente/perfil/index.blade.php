@extends('cliente.index')

@section('conteudo')

    <div class="container">
        <h1>Editar Perfil</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuario.atualizar') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $usuario->id }}"> <!-- Token de proteção contra CSRF -->
            <div class="form-group">

                <label for="usuario_nome">Nome</label>
                <input type="text" id="usuario_nome" name="usuario_nome" class="form-control"
                    value="{{ $usuario->usuario_nome }}" required>
            </div>

            <div class="form-group">
                <label for="usuario_email">E-mail</label>
                <input type="email" id="usuario_email" name="usuario_email" class="form-control" required
                    value="{{ $usuario->usuario_email }}">
            </div>

            <div class="form-group">
                <label for="usuario_senha">Nova Senha: </label>
                <input type="text" id="usuario_senha" name="usuario_senha" class="form-control" >
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>

    </div>

@endsection
