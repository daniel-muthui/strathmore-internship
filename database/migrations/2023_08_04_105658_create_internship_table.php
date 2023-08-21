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
        Schema::create('internship', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('position');
            $table->text('description');
            $table->enum('job_type',['full-time', 'part-time', 'internship','contract']);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('location');
            $table->date('application_deadline');
            $table->string('image_url')->nullable();
            $table->timestamps();
            $table->enum('category',['Technology', 'Business', 'Law','Engineering']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship');
    }
};
