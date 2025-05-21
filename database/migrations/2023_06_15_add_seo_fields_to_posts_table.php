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
            // First check if the posts table has the necessary columns
            $columns = Schema::getColumnListing('posts');
            
            // Add meta_title after an existing column
            if (in_array('is_published', $columns)) {
                $table->string('meta_title')->nullable()->after('is_published');
            } else if (in_array('featured_image', $columns)) {
                $table->string('meta_title')->nullable()->after('featured_image');
            } else {
                $table->string('meta_title')->nullable();
            }
            
            // Add the rest of the columns after meta_title
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('meta_keywords')->nullable()->after('meta_description');
            $table->boolean('enable_schema_markup')->default(false)->after('meta_keywords');
            $table->text('schema_markup')->nullable()->after('enable_schema_markup');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title',
                'meta_description',
                'meta_keywords',
                'enable_schema_markup',
                'schema_markup',
            ]);
        });
    }
};
