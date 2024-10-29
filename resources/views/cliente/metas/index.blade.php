@extends('cliente.index')
@section('conteudo')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Metas do projeto: {{$projeto_unico->projeto_nome}}</h1>
    </div>

    <div class="d-flex justify-content-center">
        <button class="btn btn-primary mt-auto mb-3">Criar nova meta</button>
    </div>
    @foreach ($meta_unica as $itemMeta)
    <div class="row">
        <div class="col-lg-6">
            <!-- Dropdown Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{$itemMeta->meta_titulo}}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Configurações:</div>
                            <form action="{{ route('meta-cliente-excluir', ['id' => $itemMeta->id])}}" method="GET">
                                <button class="dropdown-item">Excluir meta</button>
                            </form>
                            <button class="dropdown-item" data-toggle="modal" data-target="#modal{{$itemMeta->id}}">Editar meta</button>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="container mt-4 mb-4">
                        <!-- Card de Meta -->
                        <div class="card">
                            <div class="card-body d-flex flex-column">
                                <p class="card-text"><strong>Titulo: </strong>{{$itemMeta->meta_titulo}}</p>
                                <p class="card-text"><strong>Descrição: </strong>{{$itemMeta->meta_descricao}}</p>
                                <p class="card-text"><strong>Status: </strong>{{$itemMeta->meta_status}}</p>
                                <p class="card-text"><strong>Prazo: </strong>{{$itemMeta->meta_prazo}}</p>
                                <button class="btn btn-primary mt-auto">Adicionar Tarefa</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal -->
    <div class="modal " id="modal{{$itemMeta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Meta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('meta-cliente-alt-salva', $itemMeta->id) }}" method="GET">
                        @csrf <!-- Sempre colocar quando usar forms -->

                        <input type="hidden" name="id" value="{{ $itemMeta->id }}">
                        <div class="form-floating mb-3">
                            <label for="meta_titulo">Nome da meta</label>
                            <input type="text" class="form-control" name="meta_titulo" value="{{ $itemMeta->meta_titulo }}" required>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="meta_descricao">Descrição</label>
                            <input type="text" class="form-control" name="meta_descricao" value="{{ $itemMeta->meta_descricao }}" required>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="meta_status">Status</label>
                            <input type="text" class="form-control" name="meta_status" value="{{ $itemMeta->meta_status }}" required>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="meta_prazo">Data de entrega</label>
                            <input type="date" class="form-control" name="meta_prazo" value="{{ substr($itemMeta->meta_prazo, 0, 10) }}" required>
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
</div>
<!-- /.container-fluid -->

@endsection