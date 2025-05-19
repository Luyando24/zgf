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
        Schema::table('resources', function (Blueprint $table) {
            $table->string('slug')->unique()->after('title');
        });

        // Generate slugs for existing resources
        DB::table('resources')->get()->each(function ($resource) {
            DB::table('resources')
                ->where('id', $resource->id)
                ->update(['slug' => Str::slug($resource->title)]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};