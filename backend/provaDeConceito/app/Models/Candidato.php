<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = 'candidatos';
    public $fillable = [
        "nome",
        "sobrenome",
        "sobrenome",
        "email",
        "telefone",
        "sexo",
        "dataNascimento",
        "tipoUsuario",
        "CPF",
        "areaAtuacao",
        "CEP",
    ];

    public function usuario()
    {
        return $this->morphOne('App\Models\Usuario', 'usuario');
    }
}
