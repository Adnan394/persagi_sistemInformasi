<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_anggotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('gambar');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('nik');
            $table->string('pendidikan_terakhir');
            $table->string('no_kta');
            $table->string('no_str');
            $table->string('tempat_kerja_1');
            $table->string('alamat_tempat_kerja_1');
            $table->string('tempat_kerja_2')->nullable();
            $table->string('alamat_tempat_kerja_2')->nullable();
            $table->text('alamat_tinggal');
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
        Schema::dropIfExists('daftar_anggotas');
    }
}
