@extends('cliente.index')

@section('conteudo')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tarefas do projeto</h1>
    </div>
    <div class="d-flex justify-content-center">
        <button class="btn btn-primary mt-auto mb-3" data-toggle="modal" data-target="#modalCriarTarefa">Criar nova tarefa</button>
    </div>
    <div class="row">
        @foreach ($tarefa_unica as $itemTarefa)
        <div class="col-lg-6">
            <!-- Dropdown Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{$itemTarefa->tarefa_titulo}}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Configurações:</div>
                            <form action="{{ route('tarefa-cliente-excluir', ['id' => $itemTarefa->id]) }}" method="GET">
                                <button class="dropdown-item">Excluir tarefa</button>
                            </form>
                            <button class="dropdown-item" data-toggle="modal" data-target="#modal{{$itemTarefa->id}}">Editar tarefa</button>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item mb-4" href="#">Adicionar colaborador</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="container mt-4 mb-4">
                        <!-- Card de tarefa -->
                        <div class="card">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><strong>Titulo:</strong> {{$itemTarefa->tarefa_titulo}}</h5>
                                <p class="card-text"><strong>Descrição:</strong> {{$itemTarefa->tarefa_descricao}}</p>
                                <p class="card-text"><strong>Status:</strong> {{$itemTarefa->tarefa_status}}</p>
                                <p class="card-text"><strong>Prazo:</strong> {{$itemTarefa->tarefa_data_conclusao}}</p>
                                <p class="card-text"><strong>Colaborador:</strong> 
                                    @foreach ($colaboradores as $itemColaborador)
                                    @if ($itemColaborador->id == $itemTarefa->colaborador_id)
                                    {{$itemColaborador->colaborador_nome}}
                                    @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Modal ALTERAR-->
    @if (isset($itemTarefa))
    <div class="modal " id="modal{{$itemTarefa->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Tarefa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tarefa-cliente-alt-salva')}}" method="POST">
                        @csrf <!-- Sempre colocar quando usar forms -->
                        <input type="hidden" name="id" value="{{ $itemTarefa->id }}">
                        <input type="hidden" name="projeto_id" value="{{ $itemTarefa->projeto_id }}">
                        <div class="form-floating mb-3">
                            <label for="tarefa_titulo">Nome da tarefa</label>
                            <input type="text" class="form-control" name="tarefa_titulo" value="{{ $itemTarefa->tarefa_titulo }}" required>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="tarefa_descricao">Descrição</label>
                            <input type="text" class="form-control" name="tarefa_descricao" value="{{ $itemTarefa->tarefa_descricao }}" required>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="tarefa_status">Status</label>
                            <input type="text" class="form-control" name="tarefa_status" value="{{ $itemTarefa->tarefa_status }}" required>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="tarefa_data_conclusao">Data de entrega</label>
                            <input type="date" class="form-control" name="tarefa_data_conclusao" value="{{ substr($itemTarefa->tarefa_data_conclusao, 0, 10) }}" required>
                        </div>
                        

                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success" value="Alterar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
        @endforeach
    </div>
<!-- Modal CRIAR-->
        <div class="modal " id="modalCriarTarefa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Criar nova Tarefa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tarefa-cliente-salvar-novo')}}" method="POST">
                            @csrf <!-- Sempre colocar quando usar forms -->
                            <input type="hidden" name="id" value="{{ $itemTarefa->id }}">
                            <input type="hidden" name="projeto_id" value="{{ $itemTarefa->projeto_id }}">
                            <div class="form-floating mb-3">
                                <label for="tarefa_titulo">Titulo da tarefa: </label>
                                <input type="text" class="form-control" name="tarefa_titulo" required>
                            </div>
    
                            <div class="form-floating mb-3">
                                <label for="tarefa_descricao">Descrição</label>
                                <input type="text" class="form-control" name="tarefa_descricao" required>
                            </div>
    
                            <div class="form-floating mb-3">
                                <label for="tarefa_status">Status</label>
                                <input type="text" class="form-control" name="tarefa_status" required>
                            </div>
    
                            <label for="floatingInput">Selecione o(s) colaborador(es)</label> <br>
                            @foreach ($colaborador_unico as $item)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                        name="colaborador_id[]">
                                    <label class="form-check-label" value="{{ $item->id }}">
                                        @foreach ($usuarios as $itemColaborador)
                                            @if ($itemColaborador->id == $item->usuario_id)
                                                {{ $itemColaborador->usuario_nome }}
                                            @endif
                                        @endforeach
                                    </label>
                                </div>
                            @endforeach
    
                            <div class="form-floating mb-3">
                                <label for="tarefa_data_conclusao">Data de entrega</label>
                                <input type="date" class="form-control" name="tarefa_data_conclusao" required>
                            </div>
    
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success" value="Salvar novo">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</div>
<!-- /.container-fluid -->

@endsection