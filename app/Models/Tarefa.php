<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $table = "tarefa";
    protected $fillable = [
        'tarefa_titulo',
        'tarefa_descricao',
        'tarefa_status',
        'tarefa_data_conclusao',
        'meta_id',
        'projeto_id'
    ];
    public function meta(){
        return $this->belongsTo(Meta::class, 'meta_id');
    }
    public function projeto(){
        return $this->belongsTo(Projeto::class, 'projeto_id');
    }
    public function colaborador(){
        return $this->belongsToMany(Colaborador::class, 'colaborador_tarefa');
    }
}
