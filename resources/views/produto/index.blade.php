@extends('admin_template.index')

@section('conteudo')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Produtos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Listagem de Produtos</li>
        </ol>
        @if($errors->all())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Pesquisa de Produtos
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="a" class="btn btn-success" {{-- tag modal e botao modal --}} data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Novo Produto</a>
                    </div>
                </div>

                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Opções</th>
                        </tr>

                    </thead>
                    <tbody>
                        {{-- pegar o primeiro registro e imprimir na linha --}}
                        @foreach ($produtos as $linha)
                            <tr>
                                <td> {{ $linha->id }}</td>
                                <td> {{ $linha->prod_nome }} </td>
                                <td>{{ $linha->categoria->cat_nome }}</td>

                                <td>
                                    <a href=" {{ route('prod_alterar', ['id' => $linha->id]) }}"
                                        class="btn btn-primary btn-sm">
                                        <li class="fa fa-pencil"></li>
                                    </a>
                                    |
                                    <a href=" {{ route('prod_excluir', ['id' => $linha->id]) }}"
                                        class="btn btn-danger btn-sm">
                                        <li class="fa fa-trash"></li>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- testar se a variavel chegou --}}
    {{-- @php
        dd($categorias);

    @endphp --}}


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST" action="{{ route('produto_novo')}}">
                    {{-- serve para:  --}}
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" name="cat_id">
                                <option selected>Selecione uma categoria</option>
                                @foreach($categorias as $item)
                                <option value="{{ $item->id }}">{{ $item->cat_nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- alterado --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="prod_nome">
                            <label for="floatingInput">Nome do Produto</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="prod_descricao">
                            <label for="floatingInput">Descrição do Produto</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="prod_quantidade">
                            <label for="floatingInput">Quantidade</label>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
