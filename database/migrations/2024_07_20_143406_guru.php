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
        if(!Schema::hasTable('guru')){
            Schema::create('guru', function(Blueprint $table){
                $table->id();
                $table->string('nip', 255)->unique();
                $table->string('nama', 255);
                $table->string('mata_pelajaran', 255);
                $table->timestamps();
            });
        }

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('guru');
    }
};
