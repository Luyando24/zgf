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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');                        // Job title
            $table->string('slug')->unique();              // URL-friendly slug
            $table->text('summary')->nullable();           // Short summary or intro
            $table->longText('description');               // Full job description
            $table->string('location')->nullable();        // City/Province or Remote
            $table->string('type')->default('Full-Time');  // Job type: Full-Time, Part-Time, Contract, etc.
            $table->date('application_deadline');          // Deadline to apply
            $table->string('attachment')->nullable();      // Optional PDF download (TOR or Job Details)
            $table->boolean('is_active')->default(true);   // To toggle job visibility
            $table->string('category');
            $table->string('salary')->nullable();          // Salary range or amount
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
