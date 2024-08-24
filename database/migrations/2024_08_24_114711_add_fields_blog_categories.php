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
        Schema::table('blog_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('margin_left');
            $table->unsignedBigInteger('margin_right');
            $table->unsignedInteger('level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_categories', function (Blueprint $table) {
            $table->dropColumn('margin_left');
            $table->dropColumn('margin_right');
            $table->dropColumn('level');
        });
    }
};
