<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $table ='categoria';

    public function produtos()
    {
        //tras todos os produtos vinculados a categoria 
        return $this->hasMany(Produtos::class);
    }
}
