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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lname', 250)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('type', ["Cliente potencial","Cliente","Administrador", "Super usuario"] );
            $table->string('phone', 250)->nullable();
            $table->timestamp('birthdate')->nullable()->nullable();
            $table->string('official-id', 100)->nullable();
            $table->string('birth-certificate', 100)->nullable();
            $table->string('lpr-front', 100)->nullable();
            $table->string('lpr-back', 100)->nullable();
            $table->string('ssn-number', 100)->nullable();
            $table->string('ssn-card', 100)->nullable();
            $table->string('ead-card', 100)->nullable();
            $table->string('marriage-cert', 100)->nullable();
            $table->string('divorcement-cert', 100)->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->string('eyes-color', 100)->nullable();
            $table->string('hair-color', 100)->nullable();
            $table->string('passport-pages', 250)->nullable();
            //revisar $table->string('employment-history', 250)->nullable();
            $table->string('police-letter', 100)->nullable();
            $table->integer('number-of-children')->nullable();
            //revisar $table->string('children', 250)->nullable(); que se desplieguen los campos según la cantidad de niños que tiene
            $table->boolean('is-married')->default(false);
            $table->boolean('is-divorced')->default(false);
            //revisar  $table->string('spouse', 250); conectado a tabla de spouse            
            $table->timestamp('time-as-resident')->nullable();//datepicker donde ingresen su fecha
            $table->timestamp('timestamp-time-as-resident')->default(DB::raw('CURRENT_TIMESTAMP(0)'))->nullable();//automático que agarre la fecha actual
            $table->string('way-to-residence', 250)->nullable();
            $table->string('person-through-residence', 250)->nullable();
            $table->string('address-history', 250)->nullable();
            $table->string('home-country-address', 250)->nullable();
            $table->enum('spoken-english-level', ["Bajo","Medio", "Alto"] )->nullable();
            $table->enum('reading-english-level', ["Bajo","Medio", "Alto"] )->nullable();
            $table->enum('written-english-level', ["Bajo","Medio", "Alto"] )->nullable();
            $table->string('medical-condition', 250)->nullable();
            $table->boolean('pays-taxes')->default(false);
            $table->string('form-1040', 100)->nullable();
            $table->string('form-w2', 100)->nullable();
            $table->string('starting-procedure-from', 250)->nullable();
            $table->timestamp('timestamp-starting-procedure-from')->nullable();
            // revisar $table->string('migratory-history', 100); conectado a la tabla migratory
            // $table->timestamp('timestamp-migratory-history')->nullable(); fecha de actualización del historial migratorio
            $table->boolean('has-ead')->default(false);
            $table->boolean('has-ssn')->default(false);
            $table->string('prom-school', 250)->nullable();
            $table->timestamp('prom-date')->nullable();
            $table->float('anual-expenses')->nullable();
            $table->string('ead-front', 100)->nullable();
            $table->string('ead-back', 100)->nullable();
            $table->string('approval-i765', 100)->nullable();
            $table->string('approval-821d', 100)->nullable();
            $table->string('approval-i797', 100)->nullable();
            $table->string('pend-notice-i797', 100)->nullable();
            $table->string('alien-number', 250)->nullable();
            $table->boolean('welcome-package')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};