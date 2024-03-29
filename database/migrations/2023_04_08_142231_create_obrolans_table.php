<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrolansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obrolans', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tiket_id')->nullable();
            $table->unsignedInteger('cs_id')->nullable();
            $table->unsignedInteger('client_id')->nullable();
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
        Schema::dropIfExists('obrolans');
    }
}
