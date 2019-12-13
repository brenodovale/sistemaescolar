<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class Matdisciplina extends Model
{
    public $timestamps = false; // impedir que as colunas sejam gerenciadas automaticamente pelo Eloquent

    protected $fillable = ['idmatricula', 'iddisciplina','media','status','idprofessor','valor'];


    public function matricula(){
        return $this->belongsTo(Matricula::class, 'idmatricula', 'id');
    }

    public function disciplina(){
        return $this->belongsTo(Disciplina::class, 'iddisciplina', 'id');
    }

    public function professor(){
        return $this->belongsTo(Professor::class, 'idprofessor', 'id');
    }

    public function nota(){
        return $this->belongsTo(Matdisciplina::class, 'idmatdisciplinas', 'id');
    }


   

}
