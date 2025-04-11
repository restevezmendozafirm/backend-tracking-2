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
        Schema::create('formalities', function (Blueprint $table) {
            $table->id();
            $table->integer('idUser')->unique();
            $table->string('name', 250);
            $table->enum('code', ["N400","I90","N600", "Renovación DACA", "Renovación EAD", "FOIA"] );
            $table->timestamp('start-date')->nullable();
            $table->timestamp('end-date')->nullable();
            $table->enum('status', ['Datos faltantes', 'En espera de documentos', 'Pago pendiente', 'Ensamblado de paquete', 'Paquete en tránsito', 'Confirmación de datos', 'Revisión de abogado', 'Paquete enviado a USCIS']);
            $table->text('comments');
            $table->string('foia-reason');
            $table->boolean('has-foia-docs')->default(false);
            $table->string('foia-docs', 100);
            $table->float('gov-fee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formalities');
    }
};
