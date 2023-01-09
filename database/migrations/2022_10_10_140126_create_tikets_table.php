<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('teknisi_id')->nullable();
            $table->unsignedInteger('produk_id');
            $table->string('pengaduan');
            $table->string('gambar')->nullable();
            $table->enum('status', ['menunggu', 'proses', 'selesai']);
            $table->string('jawaban')->nullable();
            $table->string('tanggal_awal');
            $table->string('tanggal_akhir')->nullable();
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
        Schema::dropIfExists('tikets');
    }
}
