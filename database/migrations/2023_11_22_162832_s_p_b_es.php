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
        Schema::create('SPBEs', function (Blueprint $table) {
        $table->id(); // Auto-incremental primary key
        $table->string('nama_pt');
        $table->string('kode_spbe');
        $table->string('alamat');
        $table->string('kota');
        $table->string('no_ref');
        $table->string('cust_no');
        $table->string('patra_ref');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SPBEs');
    }
};
