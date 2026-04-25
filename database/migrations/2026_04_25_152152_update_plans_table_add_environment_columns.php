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
        Schema::table('plans', function (Blueprint $table) {
            $table->string('test_plan_code')->nullable()->after('plan_code');
            $table->string('live_plan_code')->nullable()->after('test_plan_code');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plans', function(Blueprint $table) {
            $table->dropColumn(['test_plan_code', 'live_plan_code']);

        });
    }
};
