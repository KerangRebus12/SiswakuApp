<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHobiSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobi_siswa', function (Blueprint $table) {
            //create tabel hobi siswa
            $table->integer('id_siswa')->unsigned()->index();
            $table->integer('id_hobi')->unsigned()->index();
            $table->timestamps();

            //set PK
            $table->primary(['id_siswa', 'id_hobi']);

            //set FK hobi_siswa --- siswa
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobi_siswa');
    }
}
