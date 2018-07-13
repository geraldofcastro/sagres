<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = ['nota', 'aluno_id', 'disciplina_id'];

    public function aluno()
    {
        return $this->belongsTo('App\Aluno');
    }

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }

}
