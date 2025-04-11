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
        Schema::create('spouse', function (Blueprint $table) {
            $table->id();
            $table->integer('idUser')->unique();
            $table->string('fname', 250);
            $table->string('lname', 250);
            $table->string('birth-cert', 100);
            $table->string('residence-place', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spouse');
    }
};
