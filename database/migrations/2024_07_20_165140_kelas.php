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
        //
        if(!Schema::hasTable('kelas')){
            Schema::create('kelas', function (Blueprint $table) {
                $table->id();
                $table->string('nama_kelas')->unique();
                $table->unsignedBigInteger('guru_id'); // Foreign key ke tabel guru
                $table->timestamps();


                $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade'); // Menambahkan foreign key ke tabel guru
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('kelas');
    }
};
