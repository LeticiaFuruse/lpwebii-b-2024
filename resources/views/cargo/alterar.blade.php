@extends('admin_template.index')
@section('conteudo')

<div class="container-fluid px-4">
    <h1 class="mt-4">Cargos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Alteração de Cargos</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Alterar Cargos
        </div>
        <div class="card-body">
            <div class="row">

                <form action="{{route('cargo_alt_salva')}}" method="POST">
                    @csrf <!-- Sempre colocar quando usar forms-->
                    <input type="hidden" name="id" value="{{$alterarCargo->id}}">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="cargo_nome" value="{{$alterarCargo->cargo_nome}}">
                            <label for="floatingInput">Nome do cargo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="cargo_descricao" value="{{$alterarCargo->cargo_descricao}}">
                            <label for="floatingInput">Descrição do cargo</label>
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