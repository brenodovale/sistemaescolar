<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('valormatricula', 8, 2);
            
            $table->unsignedBigInteger('idcurso');                    
            $table->unsignedBigInteger('idaluno');                 
            $table->unsignedBigInteger('idsemestre');          
            $table->unsignedBigInteger('idturma');

            $table->foreign('idcurso')->references('id')->on('cursos');
            $table->foreign('idaluno')->references('id')->on('alunos');
            $table->foreign('idsemestre')->references('id')->on('semestres');
            $table->foreign('idturma')->references('id')->on('turmas');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');

    }
}
