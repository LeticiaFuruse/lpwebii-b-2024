<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuario";
    protected $fillable = ["cargo_id",'usuario_nome', "usuario_email", "usuario_senha"];

    public function cargo(){
        return $this->belongsTo(Cargos::class, "cargo_id");
    }

    public function projeto(){
        return $this->belongsToMany(Projeto::class, 'usuario_projeto');
    }
    
}
