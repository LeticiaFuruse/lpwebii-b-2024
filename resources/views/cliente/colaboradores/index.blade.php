@extends('cliente.index')

@section('conteudo')

<div class="container">
    <h1>Lista de Colaboradores</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID do Usuário</th>
                <th>Nome do Usuário</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->usuario_id }}</td>
                    <td>{{ $usuario->usuario_nome }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection