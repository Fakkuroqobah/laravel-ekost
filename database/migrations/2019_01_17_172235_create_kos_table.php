<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemilik')->unsigned();
            $table->string('nama', 50);
            $table->integer('id_jenis')->unsigned();
            $table->string('fasilitas', 50);
            $table->integer('harga');
            $table->text('alamat');
            $table->string('kota', 50);
            $table->integer('stok');
            $table->text('keterangan')->nullable();
            $table->string('foto');
            $table->timestamps();

            $table->foreign('id_pemilik')->references('id')->on('pemilik_kos')->onDelete('cascade');
            $table->foreign('id_jenis')->references('id')->on('jenis_kos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kos');
    }
}
