<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('abuse_reports', function (Blueprint $table) {
            $table->string('ip_address')->nullable()->after('action_taken');
            $table->string('user_location')->nullable()->after('ip_address');
        });
    }

    public function down()
    {
        Schema::table('abuse_reports', function (Blueprint $table) {
            $table->dropColumn(['ip_address', 'user_location']);
        });
    }
};