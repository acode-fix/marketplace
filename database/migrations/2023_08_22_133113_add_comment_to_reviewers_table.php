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
        Schema::table('reviewers', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('reviewer_id');
            $table->string('comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviewers', function (Blueprint $table) {
            //
            $table->dropColumn('reviewer_id');
            $table->dropColumn('comment');
        });
    }
};
