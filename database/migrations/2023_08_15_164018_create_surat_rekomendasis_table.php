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
        Schema::create('surat_rekomendasis', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('fc_ktp');
            $table->string('fc_ijazah');
            $table->string('fc_str_lama');
            $table->string('pasfoto');
            $table->string('periode_sik');
            $table->string('sk_bekerja')->nullable();
            $table->string('sk_kontrak_kerja')->nullable();
            $table->string('biaya_administrasi');
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
        Schema::dropIfExists('surat_rekomendasis');
    }
};