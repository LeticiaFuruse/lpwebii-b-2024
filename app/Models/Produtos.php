<?php
// model serve para comunicar com o banco
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produtos extends Model
{
    use HasFactory;
    protected $table ='produtos';
    
    public function categoria()
    {
        return $this->belongTo(Categoria::class);
    }
}
