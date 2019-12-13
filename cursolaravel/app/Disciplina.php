<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    public $timestamps = false; // impedir que as colunas sejam gerenciadas automaticamente pelo Eloquent

    protected $fillable = ['nomedisciplina','idprofessor','valordisciplina'];


    public function professor(){
    	return $this->belongsTo(Professor::class, 'idprofessor', 'id');
    }

    public function matdisciplina()
    {
	    return $this->hasMany(Matdisciplina::class, 'iddisciplina', 'id');        
    }


}
