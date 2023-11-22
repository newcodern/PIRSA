<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('id_drivers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('ttl');
            $table->string('foto');
            $table->string('id_driver');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('id_drivers');
    }
};
