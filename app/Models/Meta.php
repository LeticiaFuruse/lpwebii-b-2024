<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $table = "meta";
    protected $fillable = ['projeto_id','meta_descricao', 
                            "meta_titulo", "meta_prazo", "meta_status"];

    public function projeto(){
        return $this->belongsTo(Projeto::class, 'projeto_id');
    }
    public function tarefa(){
        return $this->hasMany(Tarefa::class, 'meta_id');
    }
}
