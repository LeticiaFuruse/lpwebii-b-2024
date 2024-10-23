@extends('admin_template.index')
@section('conteudo')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Metas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Alteração de meta</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Alterar Metas
            </div>
            <div class="card-body">
                <div class="row">

                    <form action="{{ route('meta_alt_salva') }}" method="POST">
                        @csrf <!-- Sempre colocar quando usar forms-->

                        <input type="hidden" name="id" value="{{ $meta->id }}">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_titulo"
                                value="{{ $meta->meta_titulo }}">
                            <label for="floatingInput">Nome da meta</label>
                        </div>

                        <label value="0" for="floatingInput">Selecione um projeto</label>
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" name="projeto_id">
                                
                                @foreach ($projeto as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $meta->projeto_id ? 'selected' : '' }}>
                                        {{ $item->projeto_nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <label for="floatingInput">Selecione uma tarefa</label>

                        {{-- ajuda do gpt --}}

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_descricao"
                                value="{{ $meta->meta_descricao }}">
                            <label for="floatingInput">Descrição</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="meta_status"
                                value="{{ $meta->meta_status }}">
                            <label for="floatingInput">Status</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="meta_prazo"
                                value="{{ substr($meta->meta_prazo,0, 10) }}">
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
