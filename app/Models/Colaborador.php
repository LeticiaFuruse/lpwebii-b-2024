<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $table = "colaborador";
    protected $fillable = ['usuario_id',
    'projeto_id' ,
    'colaborador_data_admissao'];
    
    public function tarefa(){
        return $this->belongsToMany(Tarefa::class, 'colaborador_tarefa');
    }
    public function usuario(){
        return $this->belongsTo(Usuario::class, "usuario_id");
    }
    public function projeto(){
        return $this->belongsTo(Projeto::class, "projeto_id");
    }
}
