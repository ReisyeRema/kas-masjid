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
        Schema::create('pengeluaran_sosial', function (Blueprint $table) {
            $table->id();
            $table->string('uraian'); // Menyimpan uraian pemasukan
            $table->decimal('jumlah', 15, 2); // Menyimpan jumlah pemasukan
            $table->date('tanggal'); // Menyimpan tanggal pemasukan
            $table->foreignId('rekening_id')->nullable()->index('fk_pengeluaran_sosial_to_rekening');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran_sosial');
    }
};
