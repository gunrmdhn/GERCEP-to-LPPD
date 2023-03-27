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
        Schema::create('tabel_dinsos', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('sumber_data');
            $table->text('berkas');
            $table->text('bukti');
            $table->text('keterangan')->nullable();
            $table->text('keterangan_kabag')->nullable();
            $table->boolean('cek')->default(false);
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
        Schema::dropIfExists('tabel_dinsos');
    }
};
