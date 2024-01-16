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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('staff_name');
            $table->string('staff_email');
            $table->string('staff_phone');
            $table->string('course_code');
            $table->string('course_title');
            $table->text('comments')->nullable();
            $table->unsignedBigInteger('school_id');
            $table->date('reservation_date');
            $table->time('start_time');
            $table->time('finish_time')->nullable();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
