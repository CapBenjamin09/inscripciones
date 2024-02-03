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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_personal_code');
            $table->string('name');
            $table->string('lastname');
            $table->date('birthdate')->nullable();
            $table->string('incharge')->nullable();
            $table->string('phone_incharge')->nullable();
            $table->text('address')->nullable();
            $table->string('status_student');
            $table->foreignId('degree_id')->constrained()->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
