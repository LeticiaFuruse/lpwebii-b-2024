@extends('cliente.index')
@section('conteudo')
<div class="col-lg-7">
    <div class="p-5">

        <div class="text-center align-items-center">
            <h1 class="h4 text-gray-900 mb-4">Crie um projeto!</h1>
        </div>
        <form class="user" action="{{ route('novo-projeto')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Nome do projeto" name="projeto_nome" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Descrição" name="projeto_descricao" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Status" name="projeto_status" required>
            </div>
            <div class="form-group">
                <input type="date" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Data do inicio" name="projeto_data_inicio" required>
            </div>
            <div class="form-group">
                <input type="date" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Data do fim" name="projeto_data_fim" required>
            </div>

            <button class="btn btn-primary btn-user btn-block">
                Criar novo projeto
            </button>

            <hr>

        </form>

    </div>
</div>
@endsection