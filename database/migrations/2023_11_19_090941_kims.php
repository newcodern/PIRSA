<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kims', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('berlaku');
            $table->string('ttl');
            $table->string('jenis_kelamin');
            $table->string('tinggi');
            $table->string('noKIM');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};