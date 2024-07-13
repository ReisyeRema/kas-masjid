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
        Schema::table('pengeluaran_sosial', function (Blueprint $table) {
            $table->foreign('rekening_id','fk_pengeluaran_sosial_to_rekening')->references('id')->on('rekening')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengeluaran_sosial', function (Blueprint $table) {
            $table->dropForeign('fk_pengeluaran_sosial_to_rekening');
        });
    }
};
