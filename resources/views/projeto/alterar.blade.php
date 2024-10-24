@extends('admin_template.index')
@section('conteudo')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Projeto</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Alteração de projeto</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Alterar Projeto
            </div>
            <div class="card-body">
                <div class="row">

                    <form action="{{ route('projeto_alt_salva') }}" method="POST">
                        @csrf <!-- Sempre colocar quando usar forms-->

                        <input type="hidden" name="id" value="{{ $projeto->id }}">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="projeto_nome"
                                value="{{ $projeto->projeto_nome }}">
                            <label for="floatingInput">Nome do projeto</label>
                        </div>

                        <label for="floatingInput">Selecione um colaborador</label>
                        {{-- @foreach ($usuarios as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                    name="usuario_id[]">
                                <label class="form-check-label" value="{{ $item->id }}">

                                    {{ $item->usuario_nome }}
                                </label>
                            </div>
                        @endforeach --}}

                        {{-- ajuda do gpt --}}

                        @foreach ($usuarios as $item)
                            @if ($projeto->usuario->contains(function ($usuario) use ($item) {
                                    return $usuario->id === $item->id;
                                }))
                            
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                        name="usuario_id[]" checked>
                                    <label class="form-check-label" value="{{ $item->id }}">
                                        {{ $item->usuario_nome }}
                                    </label>
                                </div>
                        
                            @else
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                        name="usuario_id[]">
                                    <label class="form-check-label" value="{{ $item->id }}">
                                        {{ $item->usuario_nome }}
                                    </label>
                                </div>
                            @endif
                        @endforeach



                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="projeto_descricao"
                                value="{{ $projeto->projeto_descricao }}">
                            <label for="floatingInput">Descrição</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="projeto_status"
                                value="{{ $projeto->projeto_status }}">
                            <label for="floatingInput">Status</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="projeto_data_inicio"
                                value="{{ substr($projeto->projeto_data_inicio,0, 10) }}">
                            <label for="floatingInput">Data inicio </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="projeto_data_fim"
                                value="{{ substr($projeto->projeto_data_fim, 0,10 )}}">
                            <label for="floatingInput">Data fim</label>
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
