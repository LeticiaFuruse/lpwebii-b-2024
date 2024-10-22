@extends('admin_template.index')
@section('conteudo')

<div class="container-fluid px-4">
    <h1 class="mt-4">Usuario</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Alteração de Usuario</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Alterar Usuario
        </div>
        <div class="card-body">
            <div class="row">

                <form action="{{route('usuario_alt_salva')}}" method="POST">
                    @csrf <!-- Sempre colocar quando usar forms-->

                    <input type="hidden" name="id" value="{{$usuario_alterar->id}}">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="usuario_nome" value="{{$usuario_alterar->usuario_nome}}">
                        <label for="floatingInput">Nome do usuario</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="usuario_email" value="{{$usuario_alterar->usuario_email}}">
                        <label for="floatingInput">Email do usuario</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="usuario_senha" value="{{$usuario_alterar->usuario_senha}}">
                        <label for="floatingInput">Senha do usuario</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" aria-label="Default select example" name="cargo_id">

                            @foreach ($cargo_alterar as $item)
                                @if ($usuario_alterar->cargo_id === $item->id)
                                    <option value="{{ $item->id }}" selected>
                                        {{ $item->cargo_nome }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}">
                                        {{ $item->cargo_nome }}
                                    </option>
                                @endif
                            @endforeach

                        </select>
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