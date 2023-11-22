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
        Schema::create('kims', function (Blueprint $table) {
            $table->id();
            $table->string('urut');
            $table->string('nopol');
            $table->string('kaspasitas_tangki');
            $table->string('jenis_produk');
            $table->string('nama_pt');
            $table->date('masa_berlaku');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kims');
    }
};
