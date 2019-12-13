<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * 
     *  CDNOTA INTEGER NOT NULL,
    CDMATDISCIPLINA INTEGER,
    NOTA NUMERIC(7,2),
    REFERENCIA VARCHAR(20) CHARACTER SET ISO8859_2 COLLATE ISO8859_2,
    STATUS CHAR(2) CHARACTER SET ISO8859_2 COLLATE ISO8859_2);
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idmatdisciplinas');
            $table->decimal('nota', 7, 2);
            $table->string('referencia');
            $table->char('status', 2)->nullable();

            $table->foreign('idmatdisciplinas')->references('id')->on('matdisciplinas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
