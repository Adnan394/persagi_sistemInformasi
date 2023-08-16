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
        Schema::create('surat_s_t_r_s', function (Blueprint $table) {
            $table->id();
            $table->string('user_id'); 
            $table->string('name'); 
            $table->string('no_kta');
            $table->string('upload_kta');
            $table->string('no_str');
            $table->string('upload_str');
            $table->string('taggal_berakhir');
            $table->string('instansi');
            $table->string('no_telp');
            $table->string('is_complete')->default(0);
            $table->string('surat_jadi')->nullable();
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
        Schema::dropIfExists('surat_s_t_r_s');
    }
};