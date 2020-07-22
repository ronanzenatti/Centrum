<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $fillable = ['nome', 'descricao'];

    protected function unidades()
    {
        $this->$this->belongsToMany('App\Curso', 'unidades_cursos', 'curso_id', 'unidade_id');
    }

}
