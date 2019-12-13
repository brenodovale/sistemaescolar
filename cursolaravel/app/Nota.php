<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    public $timestamps = false; // impedir que as colunas sejam gerenciadas automaticamente pelo Eloquent

    	protected $fillable = ['idmatdisciplinas', 'nota','referencia','status'];


    public function matdisciplina(){
    	return $this->hasMany(Matdisciplina::class, 'idmatdisciplinas', 'id');
    }


}
