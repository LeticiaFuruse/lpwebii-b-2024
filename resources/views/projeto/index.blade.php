@extends('admin_template.index')

@section('conteudo')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Projeto</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Listagem de Projetos</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Pesquisa de Projetos
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Novo
                            Projeto</a>
                    </div>
                </div>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome do projeto </th>
                            <th>Usuario</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Data do inicio </th>
                            <th>Data do fim </th>
                            <th>Opções</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projeto as $linha)
                            <tr>
                                <td>{{ $linha->id }}</td>
                                <td>{{ $linha->projeto_nome }}</td>

                                <td>
                                    @foreach ($linha->usuario as $usuario)
                                        {{ $usuario->usuario_nome }} <br>
                                    @endforeach
                                </td>
                                
                                <td>{{ $linha->projeto_descricao }}</td>
                                <td>{{ $linha->projeto_status }}</td>
                                <td>{{ $linha->projeto_data_inicio }}</td>
                                <td>{{ $linha->projeto_data_fim }}</td>
                                <td>

                                    <a href="{{ route('projeto_alterar', ['id' => $linha->id]) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"> </i>
                                    </a>

                                    |

                                    <a href="{{ route('projeto_excluir', ['id' => $linha->id]) }}"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"> </i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="/projeto" method="POST">
                    @csrf <!-- Sempre colocar quando usar forms-->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro de novo Projeto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="projeto_nome">
                            <label for="floatingInput">Nome do projeto</label>
                        </div>

                        <label for="floatingInput">Selecione um colaborador</label>
                            @foreach ($usuarios as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="usuario_id[]">
                                <label class="form-check-label" value="{{ $item->id }}">
                                    
                                    {{ $item->usuario_nome }}
                                </label>
                            </div>
                            @endforeach

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="projeto_descricao">
                            <label for="floatingInput">Descrição</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="projeto_status">
                            <label for="floatingInput">Status</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="projeto_data_inicio">
                            <label for="floatingInput">Data inicio</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="projeto_data_fim">
                            <label for="floatingInput">Data fim</label>
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
