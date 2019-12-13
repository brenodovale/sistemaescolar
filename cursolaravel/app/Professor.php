<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    public $timestamps = false; // impedir que as colunas sejam gerenciadas automaticamente pelo Eloquent



    protected $fillable = ['nomeprofessor'];
}
