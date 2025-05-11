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
        Schema::create('partner_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->string('organization')->required();
            $table->string('email')->required();
            $table->string('phone')->nullable();
            $table->string('partnership_type')->required();
            $table->text('message')->required();
            $table->string('document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_requests');
    }
};
