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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('meta_title')->nullable()->after('youtube_url');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('meta_keywords')->nullable()->after('meta_description');
            $table->string('og_image')->nullable()->after('meta_keywords');
            $table->string('google_analytics_id')->nullable()->after('og_image');
            $table->text('header_scripts')->nullable()->after('google_analytics_id');
            $table->text('footer_scripts')->nullable()->after('header_scripts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title',
                'meta_description',
                'meta_keywords',
                'og_image',
                'google_analytics_id',
                'header_scripts',
                'footer_scripts',
            ]);
        });
    }
};