<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cargos extends Model
{
    use HasFactory;
    protected $table = "cargo";
    protected $fillable = ['cargo_nome', "cargo_descricao"];

    public function usuario(){
        return $this->hasMany(Usuario::class, "cargo_id");
    }
}
