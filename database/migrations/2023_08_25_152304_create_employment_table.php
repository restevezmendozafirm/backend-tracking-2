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
        Schema::create('employment', function (Blueprint $table) {
            $table->id();
            $table->integer('idUser')->unique();
            $table->string('company_name', 250);
            $table->string('company_address', 250);
            $table->string('occupation', 250);
            $table->timestamp('start-date')->nullable();
            $table->timestamp('end-date')->nullable();
            $table->timestamps();
        });  //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employment');
    }
};
