<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nidn');
            $table->string('nama');
            $table->string('fakultas');
            $table->string('prodi');
            $table->string('no_hp');
            $table->string('no_wa')->nullable();
            $table->string('email');
            $table->enum('status', ['0','1'])->default('0');
            $table->bigInteger('id_kelas')->unsigned();
            $table->foreign('id_kelas')->on('kelas')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesertas');
    }
}
