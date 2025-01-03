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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('entity')->nullable();
            $table->string('occupation')->nullable();
            $table->string('education_level')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['M', 'F']);
            $table->string('birthplace')->nullable();
            $table->enum('marital_status', ['Soltero', 'Casado', 'Divorciado', 'Viudo', 'Otro']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
