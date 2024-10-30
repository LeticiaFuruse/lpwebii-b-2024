@extends('cliente.index')

@section('conteudo')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tarefas do projeto</h1>
    </div>
    <div class="d-flex justify-content-center">
        <button class="btn btn-primary mt-auto mb-3">Criar nova tarefa</button>
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
                            <a class="dropdown-item" href="#">Editar tarefa</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item mb-4" href="#">Adicionar colaborador</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="container mt-4 mb-4">
                        <!-- Card de Meta -->
                        <div class="card">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><strong>Titulo:</strong> {{$itemTarefa->tarefa_titulo}}</h5>
                                <p class="card-text"><strong>Descrição:</strong> {{$itemTarefa->tarefa_descricao}}</p>
                                <p class="card-text"><strong>Status:</strong> {{$itemTarefa->tarefa_status}}</p>
                                <p class="card-text"><strong>Prazo:</strong> {{$itemTarefa->tarefa_data_conclusao}}</p>
                                <p class="card-text"><strong>Colaborador:</strong> {{$itemTarefa->colaborador_id}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @endforeach
    </div>

</div>
<!-- /.container-fluid -->

@endsection