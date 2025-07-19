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
        Schema::create('attendances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade');
            $table->date('attendance_date');
            $table->timestamp('scan_time')->nullable();
            $table->foreignUuid('location_id')->constrained()->onDelete('cascade');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('photo_path');
            $table->enum('status', ['check_in', 'check_out', 'absent'])->default('check_in');
            $table->enum('time_status', ['on_time', 'late', 'absent'])->default('on_time');
            $table->boolean('is_valid_location')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
