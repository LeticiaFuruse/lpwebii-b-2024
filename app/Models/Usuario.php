<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = "usuario";
    protected $fillable = [ 'usuario_nome',
    'usuario_email',
    'usuario_senha',
    'usuario_admin',
    'cargo_id',];


    public function cargo(){
        return $this->belongsTo(Cargos::class, "cargo_id");
    }

    public function projeto(){
        return $this->belongsToMany(Projeto::class, 'usuario_projeto');
    }
    public function colaborador(){
        return $this->belongsTo(Colaborador::class, "usuario_id");
    }

}