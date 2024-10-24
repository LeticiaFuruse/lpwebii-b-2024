@extends('admin_template.index')
@section('conteudo')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tarefas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Alteração de tarefa</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Alterar tarefa
            </div>
            <div class="card-body">
                <div class="row">

                    <form action="{{ route('tarefa_alt_salva') }}" method="POST">
                        @csrf <!-- Sempre colocar quando usar forms-->

                        <input type="hidden" name="id" value="{{ $tarefa->id }}">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tarefa_titulo"
                                value="{{ $tarefa->tarefa_titulo }}">
                            <label for="floatingInput">Nome da tarefa</label>
                        </div>

                        <label value="0" for="floatingInput">Selecione um projeto</label>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" name="projeto_id">

                                @foreach ($projeto as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $tarefa->projeto_id ? 'selected' : '' }}>
                                        {{ $item->projeto_nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <label for="floatingInput">Selecione o(s) colaborador(es)</label> <br>
                        @foreach ($colaborador_all as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                    name="colaborador_id[]" {{-- Verifique se o colaborador está associado à tarefa e marque o checkbox --}}
                                    @if ($tarefa->colaborador->contains($item->id)) checked @endif>
                                <label class="form-check-label" value="{{ $item->id }}">
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->id == $item->usuario_id)
                                            {{ $usuario->usuario_nome }}
                                        @endif
                                    @endforeach
                                </label>
                            </div>
                        @endforeach

                        {{-- nullish coalescing:
                        @foreach ($tarefa as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                    name="tarefa_id[]" {{ $item->meta ? 'checked' : '' }}>
                                <label class="form-check-label" value="{{ $item->id }}">
                                    {{ $item->tarefa_titulo }}
                                </label>
                            </div>
                        @endforeach --}}

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tarefa_descricao"
                                value="{{ $tarefa->tarefa_descricao }}">
                            <label for="floatingInput">Descrição</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tarefa_status"
                                value="{{ $tarefa->tarefa_status }}">
                            <label for="floatingInput">Status</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="tarefa_data_conclusao"
                                value="{{ substr($tarefa->tarefa_data_conclusao, 0, 10) }}">
                            <label for="floatingInput">Data de entrega</label>
                        </div>


                        <div class="row">
                            <div clas="col-md-4">
                                <input type="submit" class="btn btn-success" value="Alterar">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
