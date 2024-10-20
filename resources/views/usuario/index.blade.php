@extends('admin_template.index')

@section('conteudo')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Usuario</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Listagem de Usuario</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Pesquisa de Usuario
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Novo
                            Usuario</a>
                    </div>
                </div>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome do usuario</th>
                            <th>Email do usuario</th>
                            <th>Senha do usuario</th>
                            <th>Cargo do usuario</th>
                            <th>Opções</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuario as $linha)
                            <tr>
                                <td>{{ $linha->id }}</td>
                                <td>{{ $linha->usuario_nome }}</td>
                                <td>{{ $linha->usuario_email }}</td>
                                <td>{{ $linha->usuario_senha }}</td>
                                <td>{{ $linha->cargo->cargo_nome }}</td>
                                <td>

                                    <a href="{{ route('usuario_alterar', ["id"=>$linha->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"> </i>
                                    </a>

                                    |
                                    
                                    <a href='{{ route('usuario_excluir', ["id"=>$linha->id ]) }}' class="btn btn-danger btn-sm">
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

                <form action="/usuario" method="POST">
                    @csrf <!-- Sempre colocar quando usar forms-->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro de novo Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="usuario_nome">
                            <label for="floatingInput">Nome do usuario</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="usuario_email">
                            <label for="floatingInput">Email do usuario</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="usuario_senha">
                            <label for="floatingInput">Senha do usuario</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" name="cargo_id">
                                <option value="0">Selecione um cargo</option>
                                @foreach ($cargo as $item)
                                    <option value="{{ $item->id }}">{{ $item->cargo_nome }}</option>
                                @endforeach
                            </select>
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
