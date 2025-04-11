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
        Schema::create('migratory_history', function (Blueprint $table) {
            $table->id();
            $table->integer('idUser')->unique();
            $table->enum('type', ["Entrada","Salida"] );
            $table->integer('year');
            $table->integer('month');
            $table->integer('age');
            $table->enum('mode', ["Ilegal","Legal"] );
            $table->enum('medium', ["Aéreo","Terrestre","Marítimo"] );
            $table->timestamps();
        });  //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('migratory_history');
    }
};
