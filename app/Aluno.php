<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = ['matricula', 'nome', 'endereco', 'bairro', 'cep', 'cidade', 'uf', 'email'];
}
