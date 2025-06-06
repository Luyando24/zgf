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
        Schema::table('community_initiatives', function (Blueprint $table) {
            $table->string('created_by')->after('title')->comment('Person or organization that created this initiative');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('community_initiatives', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
    }
};
