<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('pasien');
            $table->string('no_telepon');
            $table->string('berat_badan');
            $table->string('tinggi_badan');
            $table->string('tanggal_lahir');
            $table->string('jadwal_konsultasi');
            $table->string('keluhan');
            $table->string('is_complete')->nullable();
            $table->string('konseler')->nullable();
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
        Schema::dropIfExists('konsultasis');
    }
};