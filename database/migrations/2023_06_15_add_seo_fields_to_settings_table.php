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
        // Check if settings table exists
        if (!Schema::hasTable('settings')) {
            // If not, we'll skip this migration as the create_settings_table migration
            // will handle creating the table with all the necessary fields
            return;
        }
        
        Schema::table('settings', function (Blueprint $table) {
            // Check if columns already exist
            $columns = Schema::getColumnListing('settings');
            
            // Only add columns that don't already exist
            if (!in_array('meta_title', $columns)) {
                if (in_array('youtube_url', $columns)) {
                    $table->string('meta_title')->nullable()->after('youtube_url');
                } else {
                    $table->string('meta_title')->nullable();
                }
            }
            
            if (!in_array('meta_description', $columns)) {
                $table->text('meta_description')->nullable()->after(in_array('meta_title', $columns) ? 'meta_title' : 'youtube_url');
            }
            
            if (!in_array('meta_keywords', $columns)) {
                $table->string('meta_keywords')->nullable()->after(in_array('meta_description', $columns) ? 'meta_description' : 'meta_title');
            }
            
            if (!in_array('og_image', $columns)) {
                $table->string('og_image')->nullable()->after(in_array('meta_keywords', $columns) ? 'meta_keywords' : 'meta_description');
            }
            
            if (!in_array('google_analytics_id', $columns)) {
                $table->string('google_analytics_id')->nullable()->after(in_array('og_image', $columns) ? 'og_image' : 'meta_keywords');
            }
            
            if (!in_array('header_scripts', $columns)) {
                $table->text('header_scripts')->nullable()->after(in_array('google_analytics_id', $columns) ? 'google_analytics_id' : 'og_image');
            }
            
            if (!in_array('footer_scripts', $columns)) {
                $table->text('footer_scripts')->nullable()->after(in_array('header_scripts', $columns) ? 'header_scripts' : 'google_analytics_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasTable('settings')) {
            return;
        }
        
        Schema::table('settings', function (Blueprint $table) {
            // Only drop columns that exist
            $columns = Schema::getColumnListing('settings');
            
            $columnsToCheck = [
                'meta_title',
                'meta_description',
                'meta_keywords',
                'og_image',
                'google_analytics_id',
                'header_scripts',
                'footer_scripts',
            ];
            
            $columnsToDrop = array_intersect($columnsToCheck, $columns);
            
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
