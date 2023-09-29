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
        Schema::table('order_packages', function (Blueprint $table) {
            $table->float('pac_reward')->after('pac_gateway')->default(0);
            $table->float('pac_point')->after('pac_reward')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_packages', function (Blueprint $table) {
            $table->dropColumn('pac_reward');
            $table->dropColumn('pac_point');
        });
    }
};
