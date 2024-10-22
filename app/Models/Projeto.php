<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $table = "projeto";
    protected $fillable = ['projeto_nome', 'projeto_descricao', 
                            "projeto_status", "projeto_data_inicio", "projeto_data_fim"];

    public function usuario(){
        return $this->belongsToMany(Usuario::class, 'usuario_projeto');
    }
    public function meta(){
        return $this->hasMany(Meta::class, 'projeto_id');
    }
    public function tarefa(){
        return $this->hasMany(Tarefa::class, 'projeto_id');
    }
 
}
