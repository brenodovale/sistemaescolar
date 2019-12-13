<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    public $timestamps = false; // impedir que as colunas sejam gerenciadas automaticamente pelo Eloquent



    protected $fillable = ['nomealuno', 'nmatricula', 'status'];

/*
    public function matricula(){
    	return $this->hasOne(Matricula::class, 'idaluno', 'id');
    }

    */
}
