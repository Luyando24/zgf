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
        Schema::table('posts', function (Blueprint $table) {
            // Get existing columns
            $columns = Schema::getColumnListing('posts');
            
            // Only add columns that don't already exist
            if (!in_array('meta_title', $columns)) {
                if (in_array('is_published', $columns)) {
                    $table->string('meta_title')->nullable()->after('is_published');
                } else {
                    $table->string('meta_title')->nullable();
                }
            }
            
            if (!in_array('meta_description', $columns)) {
                $table->text('meta_description')->nullable()->after(in_array('meta_title', $columns) ? 'meta_title' : 'is_published');
            }
            
            if (!in_array('meta_keywords', $columns)) {
                $table->string('meta_keywords')->nullable()->after(in_array('meta_description', $columns) ? 'meta_description' : 'meta_title');
            }
            
            if (!in_array('enable_schema_markup', $columns)) {
                $table->boolean('enable_schema_markup')->default(false)->after(in_array('meta_keywords', $columns) ? 'meta_keywords' : 'meta_description');
            }
            
            if (!in_array('schema_markup', $columns)) {
                $table->text('schema_markup')->nullable()->after(in_array('enable_schema_markup', $columns) ? 'enable_schema_markup' : 'meta_keywords');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Only drop columns that exist
            $columns = Schema::getColumnListing('posts');
            
            $columnsToCheck = [
                'meta_title',
                'meta_description',
                'meta_keywords',
                'enable_schema_markup',
                'schema_markup',
            ];
            
            $columnsToDrop = array_intersect($columnsToCheck, $columns);
            
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};


