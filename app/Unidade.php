<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidade extends Model
{
    use SoftDeletes;

    protected $table = 'unidades';

    protected $fillable = [
        'tipo', 'unidade', 'nome', 'rua', 'numero', 'complemento', 'bairro', 'cep', 'cidade', 'uf', 'email', 'site', 'telefone1', 'telefone2', 'foto', 'capa', 'descricao'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'unidades_user', 'unidade_id', 'user_id')->withPivot(['administrador']);
    }

    public function cursos()
    {
        return $this->belongsToMany('App\Cursos', 'unidades_cursos', 'unidade_id', 'curso_id');
    }
}
