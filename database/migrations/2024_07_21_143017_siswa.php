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
        if(!Schema::hasTable('siswa')){ 
            Schema::create('siswa', function (Blueprint $table){
                $table->id();
                $table->string('nama', 255);
                $table->string('nis', 255)->unique();
                $table->string('email', 255);
                $table->unsignedBigInteger('kelas_id'); //foreign key untuk menghubungkan ke tabel kelas
                $table->string('agama');
                $table->timestamps();

                $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade'); //menambahkan foreign key untuk menghubungkan ke tabel kelas
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('siswa');
    }
};
