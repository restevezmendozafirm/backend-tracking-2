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
        Schema::create('parent', function (Blueprint $table) {
            $table->id();
            $table->integer('idUser')->unique();
            $table->enum('relation', ["Madre","Padre","Abuelo", "Abuela"]);
            $table->string('fname', 250);
            $table->string('lname', 250);
            $table->boolean('is-married')->default(false);
            $table->boolean('is-divorced')->default(false);
            $table->boolean('pays-taxes')->default(false);
            $table->boolean('has-children')->default(false);
            $table->integer('number-of-children');
            $table->float('height');
            $table->float('weight');
            $table->string('eyes-color', 250);
            $table->string('hair-color', 250);
            $table->timestamp('birthdate');
            $table->string('birth-place', 250);
            $table->timestamp('residence-place')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent');
    }
};
