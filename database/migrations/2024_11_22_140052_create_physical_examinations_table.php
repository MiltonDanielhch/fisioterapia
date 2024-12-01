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
        Schema::create('physical_examinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->decimal('weight', 4, 2)->nullable();
            $table->decimal('height', 4, 2)->nullable();
            $table->decimal('stature', 4, 2)->nullable();
            $table->decimal('imc', 4, 2)->nullable();
            $table->string('ethnicity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_examinations');
    }
};
