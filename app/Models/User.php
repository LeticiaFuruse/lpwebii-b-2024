<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usuario_nome',
        'usuario_email',
        'usuario_senha',
        'usuario_admin',
        'cargo_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'usuario_senha',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'usuario_senha' => 'hashed',
        ];
    }
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
