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
        Schema::create('community_initiatives', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->text('summary');
            $table->text('description');
            $table->string('video_url');
            $table->string('cover_image');
            $table->string('location');
            $table->string('slug');
            $table->date('start_date');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->date('end_date');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_initiatives');
    }
};
