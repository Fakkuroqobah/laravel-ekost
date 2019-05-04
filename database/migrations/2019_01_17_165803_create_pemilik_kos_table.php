<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemilikKosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilik_kos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemilik')->unsigned();
            $table->string('nama', 50);
            $table->text('alamat');
            $table->string('no_rek', 20);
            $table->string('password');
            $table->timestamps();

            $table->foreign('id_pemilik')->references('id')->on('pemilik_kos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemilik_kos');
    }
}
