<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('scholarships', function (Blueprint $table) {
            // First drop the foreign key constraint
            $table->dropForeign(['university_id']);

            // Then drop the column
            $table->dropColumn('university_id');
        });
    }

    public function down(): void
    {
        Schema::table('scholarships', function (Blueprint $table) {
            // Re-add the column (adjust as needed)
            $table->foreignId('university_id')->constrained()->onDelete('cascade');
        });
    }
};

