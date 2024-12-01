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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
            $table->text('vital_signs');
            $table->text('observations');
            $table->foreignId('disease_type_id')->constrained('disease_types');
            $table->foreignId('vital_sign_type_id')->constrained('vital_sign_types');
            $table->foreignId('patient_id')->constrained('patients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};
