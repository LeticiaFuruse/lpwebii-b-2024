@extends('cliente.index')
@section('conteudo')
<div class="col-lg-7 col-md-10 col-sm-12 mx-auto">
    <div class="p-5 bg-light rounded shadow">

        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Crie um projeto!</h1>
        </div>
        
        <form class="user" action="{{ route('novo-projeto')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="projeto_nome"
                    placeholder="Nome do projeto" name="projeto_nome" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="projeto_descricao"
                    placeholder="Descrição" name="projeto_descricao" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="projeto_status"
                    placeholder="Status" name="projeto_status" required>
            </div>
            <div class="form-group">
                <input type="date" class="form-control form-control-user" id="projeto_data_inicio"
                    placeholder="Data do início" name="projeto_data_inicio" required>
            </div>
            <div class="form-group">
                <input type="date" class="form-control form-control-user" id="projeto_data_fim"
                    placeholder="Data do fim" name="projeto_data_fim" required>
            </div>

            <button class="btn btn-primary btn-user btn-block" type="submit">
                Criar novo projeto
            </button>

            <hr>

        </form>

    </div>
</div>

@endsection