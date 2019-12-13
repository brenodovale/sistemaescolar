<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
   	public $timestamps = false; // impedir que as colunas sejam gerenciadas automaticamente pelo Eloquent

    protected $fillable = ['nometurma'];
}
