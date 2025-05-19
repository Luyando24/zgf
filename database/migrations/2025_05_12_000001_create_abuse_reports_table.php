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
        Schema::create('abuse_reports', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Can be null if anonymous
            $table->string('email')->nullable(); // Can be null if anonymous
            $table->string('phone')->nullable();
            $table->string('location');
            $table->string('report_type');
            $table->string('subject');
            $table->text('description');
            $table->string('evidence_file')->nullable();
            $table->boolean('is_anonymous')->default(false);
            $table->enum('status', ['pending', 'under_review', 'resolved', 'dismissed'])->default('pending');
            $table->text('action_taken')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abuse_reports');
    }
};