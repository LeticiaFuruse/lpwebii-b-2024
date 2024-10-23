@extends('admin_template.index')

@section('conteudo')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Metas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Listagem de Metas</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Pesquisa de Metas
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Nova
                            Meta</a>
                    </div>
                </div>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titulo da meta </th>
                            <th>Projeto</th>
                            <th>Descrição</th>
                            <th>Tarefas</th>
                            <th>Status</th>
                            <th>Prazo </th>
                            <th>Opções</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meta as $linha)
                            <tr>
                                <td>{{ $linha->id }}</td>
                                <td>{{ $linha->meta_titulo }}</td>
                                <td>{{ $linha->projeto->projeto_nome }}</td>
                                <td>{{ $linha->meta_descricao }}</td>
                                <td>
                                    @foreach ($linha->tarefa as $tarefa)
                                        {{ $tarefa->tarefa_titulo }} <br>
                                    @endforeach
                                </td>

                                <td>{{ $linha->meta_status }}</td>
                                <td>{{ $linha->meta_prazo }}</td>

                                <td>

                                    <a href="{{ route('meta_alterar', ['id' => $linha->id]) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"> </i>
                                    </a>

                                    |

                                    <a href="{{ route('meta_excluir', ['id' => $linha->id]) }}"
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

                <form action="/metas" method="POST">
                    @csrf <!-- Sempre colocar quando usar forms-->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro de nova Meta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_titulo">
                            <label for="floatingInput">Titulo da meta</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" name="projeto_id">
                                <option value="0">Selecione um projeto</option>
                                @foreach ($projeto as $item)
                                    <option value="{{ $item->id }}">{{ $item->projeto_nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="floatingInput">Selecione a(s) tarefa(s)</label> <br>
                        @if ($tarefa_all->isEmpty() || !$tarefa_all->contains('meta_id', null))
                            <p>Não há nenhuma tarefa disponível.</p>
                        @else
                            @foreach ($tarefa_all as $item)
                                @if ($item->meta_id == null)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                            name="tarefa_id[]">
                                        <label class="form-check-label" value="{{ $item->id }}">

                                            {{ $item->tarefa_titulo }}
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        @endif

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_descricao">
                            <label for="floatingInput">Descrição</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_status">
                            <label for="floatingInput">Status</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="meta_prazo">
                            <label for="floatingInput">Prazo</label>
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
