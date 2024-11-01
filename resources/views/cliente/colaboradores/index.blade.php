@extends('cliente.index')
@section('conteudo')
<div class="container mt-4">


    <!-- Formulário de cadastro -->
    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto mt-5">
        <div class="p-5 bg-light rounded shadow">

            <div class="text-center">
                <h1 class="text-center mb-4">Cadastro de Novo Colaborador</h1>
            </div>

            <form class="user" action="{{ route('colaborador-salvar-novo') }}" method="POST">
                @csrf <!-- Sempre colocar quando usar forms-->
                <input type="hidden" name="projeto_id" value="{{ request('id') }}">

                <div class="form-group mb-3">
                    <label for="usuario_id" class="form-label">Selecione um usuario:</label>
                    <select class="form-control form-control-user" name="usuario_id" id="usuario_id" required>
                        <option value="" disabled selected>Selecione um colaborador</option>
                        @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->usuario_nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="funcao" class="form-label">Defina a função:</label>
                    <input type="text" class="form-control form-control-user" name="funcao" id="funcao" placeholder="Nome da função" required>
                </div>

                <div class="d-grid mb-3 mt-3 mx-auto text-center">
                    <button class="btn btn-primary btn-user btn-block" type="submit">
                        Salvar
                    </button>
                </div>

                <hr>
            </form>

        </div>
    </div>

    <!-- tabela de colaboradores -->
    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto mt-5">
        <h1 class="text-center mb-4">Lista de Colaboradores</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="background-color: transparent;">
                <thead class="thead-light">
                    <tr>
                        <th>Nome do Usuário</th>
                        <th>Função</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colaborador as $item)
                    <tr>
                        <td>{{ $item->usuario->usuario_nome }}</td>
                        <td>{{ $item->funcao }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection