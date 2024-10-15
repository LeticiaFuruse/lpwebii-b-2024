
@extends ("admin_template.index")

@section("conteudo")


<div class="container-fluid px-4">
    <h1 class="mt-4">Produtos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Alteração de produto</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
             Alterar de Produtos
        </div>
        <div class="card-body">
            <div class="row">

                <form method="POST" action="{{ route('prod_alt_salva')}}">
                    {{-- serve para:  --}}
                    @csrf
                    <input type="hidden" name="id" value="{{ $produtos->id }}">
                        {{-- alterado --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" 
                                                name="prod_nome" 
                                                value="{{ $produtos->prod_nome }}">
                            <label for="floatingInput">Nome da produto</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="prod_descricao" value="{{ $produtos->prod_descricao}}">
                            <label for="floatingInput">Descrição</label>
                        </div>
                         <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" name="cat_id">
                                    <option selected>Selecione uma categoria</option>
                                        @foreach($categorias as $item)
                                            <option value="{{ $item->id }}">{{ $item->cat_nome}}</option>
                                        @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-success" value="SALVAR">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
