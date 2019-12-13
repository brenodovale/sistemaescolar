<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Curso extends Model
{
	public $timestamps = false; // impedir que as colunas sejam gerenciadas automaticamente pelo Eloquent



    protected $fillable = ['nomecurso', 'valorcurso'];

 	public function matricula(){
    	return $this->hasOne(Matricula::class, 'idcurso', 'id');
    }
   
}
