@extends('cliente.index')

@section('conteudo')

<div class="container mt-5">
    <h1 class="text-center">Perfil</h1>
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10 col-md-10 col-sm-12">
            <div class="card shadow-sm p-4">
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


                <h4 class="text-center mb-4">Informações do Usuário</h4>

                <form action="{{ route('usuario.atualizar') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $usuario->id }}">

                    <div class="form-group mb-3">
                        <label for="usuario_nome" class="form-label">Nome</label>
                        <input type="text" id="usuario_nome" name="usuario_nome" class="form-control"
                            value="{{ $usuario->usuario_nome }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="usuario_email" class="form-label">E-mail</label>
                        <input type="email" id="usuario_email" name="usuario_email" class="form-control" required
                            value="{{ $usuario->usuario_email }}">
                    </div>

                    <div class="form-group">
                        <label for="cargo_id">Cargo</label>
                        <select id="cargo_id" name="cargo_id" class="form-control" required>
                            @foreach ($cargo_all as $cargo)
                            <option value="{{ $cargo->id }}" {{ $usuario->cargo_id == $cargo->id ? 'selected' : '' }}>
                                {{ $cargo->cargo_nome }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="usuario_senha" class="form-label">Nova Senha</label>
                        <input type="password" id="usuario_senha" name="usuario_senha" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Atualizar dados cadastrais</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection