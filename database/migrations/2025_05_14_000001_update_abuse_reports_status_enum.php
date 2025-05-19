<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // For MySQL, we need to modify the ENUM values
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE abuse_reports MODIFY COLUMN status ENUM('pending', 'under_investigation', 'resolved', 'dismissed', 'referred') DEFAULT 'pending'");
        } 
        // For other database systems, we might need a different approach
        else {
            // First, convert any 'under_review' values to 'under_investigation'
            DB::table('abuse_reports')
                ->where('status', 'under_review')
                ->update(['status' => 'under_investigation']);
            
            // Then recreate the column with the new constraints
            Schema::table('abuse_reports', function (Blueprint $table) {
                $table->dropColumn('status');
            });
            
            Schema::table('abuse_reports', function (Blueprint $table) {
                $table->enum('status', ['pending', 'under_investigation', 'resolved', 'dismissed', 'referred'])
                    ->default('pending')
                    ->after('is_anonymous');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // For MySQL
        if (DB::connection()->getDriverName() === 'mysql') {
            // Convert any 'under_investigation' values to 'under_review' before changing the ENUM
            DB::table('abuse_reports')
                ->where('status', 'under_investigation')
                ->update(['status' => 'under_review']);
                
            DB::statement("ALTER TABLE abuse_reports MODIFY COLUMN status ENUM('pending', 'under_review', 'resolved', 'dismissed') DEFAULT 'pending'");
        } 
        // For other database systems
        else {
            // Convert values first
            DB::table('abuse_reports')
                ->where('status', 'under_investigation')
                ->update(['status' => 'under_review']);
                
            // Then recreate the column
            Schema::table('abuse_reports', function (Blueprint $table) {
                $table->dropColumn('status');
            });
            
            Schema::table('abuse_reports', function (Blueprint $table) {
                $table->enum('status', ['pending', 'under_review', 'resolved', 'dismissed'])
                    ->default('pending')
                    ->after('is_anonymous');
            });
        }
    }
};