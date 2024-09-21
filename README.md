## Aula 08 - 20/09/2024

- CRUD

# Projeto com CRUD 
    - tabela Categoria 
    - tabela Produto

# Configurações 
    - Banco de Dados
        config/database.php
    - configurando o template 
        - criando o index.blade.php

# Criação do CRUD
    - Migration (criar tabelas)
        - php artisan make:migration create_categoria_table
    - Model (mostrar pro laravel a tabela)
        - php artisan make:model Categoria

    - Route (criar as rotas para as paginas)
        - rota chama o controller e o controller chama a view (nesta ordem)
    - Controller
        - php artisan make:controller CategoriaController
        - Inserir, ALterar, Update, Delete
    - View (ver na tela)


# comandos ERRO
- Laravel pedindo banco de dados:
    - php artisan migrate - php artisan serve 

- erro no Css 
    - renomear caminho das pastas

- executar banco de dados 
    - php artisan migrate 
