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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->year('cycle');
            $table->string('paid_registration')->nullable();
            $table->string('voucher_record')->nullable();
            $table->text('comments')->nullable();
            $table->foreignId('degree_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
