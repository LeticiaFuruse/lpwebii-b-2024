<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria';
    //tabela do banco chama categoria em minusculo 
    protected $fillable = ['cat_nome', 'cat_descricao'];

    // Relacionamento com Produto
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'cat_id');
    }
}
