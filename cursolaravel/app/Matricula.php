<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    	public $timestamps = false; // impedir que as colunas sejam gerenciadas automaticamente pelo Eloquent

    	protected $fillable = ['idcurso', 'idaluno','idsemestre','idturma','valormatricula'];

   
// belongsTo - pertence a
    public function aluno(){
    	return $this->belongsTo(Aluno::class, 'idaluno', 'id');
    }

    public function curso(){
    	return $this->belongsTo(Curso::class, 'idcurso', 'id');
    }

    public function semestre(){
    	return $this->belongsTo(Semestre::class, 'idsemestre', 'id');
    }

    public function turma(){
    	return $this->belongsTo(Turma::class, 'idturma', 'id');
    }
}
