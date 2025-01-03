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
        Schema::create('medical_diagnosis', function (Blueprint $table) {
            $table->id();
            $table->enum('diagnosis_type', ['Reflejos', 'Sensibilidad', 'Lenguaje/Orientacion', 'Otros']);
            $table->text('observations');
            $table->foreignId('patient_id')->constrained('patients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_diagnosis');
    }
};
