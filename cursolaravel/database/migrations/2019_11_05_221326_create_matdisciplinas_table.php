<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatdisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matdisciplinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idmatricula');
            $table->unsignedBigInteger('iddisciplina');
            $table->decimal('media', 7, 2)->nullable();
            $table->char('status', 2)->nullable();
            $table->unsignedBigInteger('idprofessor')->nullable();
            $table->decimal('valor', 7, 2);

            $table->foreign('idmatricula')->references('id')->on('matriculas');
            $table->foreign('iddisciplina')->references('id')->on('disciplinas');
            $table->foreign('idprofessor')->references('id')->on('professors');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matdisciplinas');
    }
}
