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
        Schema::table('programs', function (Blueprint $table) {
            // Cast the column manually
            DB::statement('ALTER TABLE programs ALTER COLUMN application_documents TYPE json USING application_documents::json');
            DB::statement('ALTER TABLE programs ALTER COLUMN requirements TYPE json USING requirements::json');
            
           
            $table->json('application_documents')->change();
            $table->json('requirements')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->string('application_documents')->change();
        $table->string('requirements')->change();
    }
};
