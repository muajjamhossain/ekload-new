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
            $table->float('pac_regular')->after('pac_gateway');
            $table->float('pac_offer')->after('pac_regular');
            $table->float('pac_rate')->after('pac_offer');
            $table->float('pac_discount')->default(0)->after('pac_rate');
            $table->string('coupon')->nullable()->after('pac_discount');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_packages', function (Blueprint $table) {
            $table->dropColumn('pac_regular');
            $table->dropColumn('pac_offer');
            $table->dropColumn('pac_rate');
            $table->dropColumn('pac_discount');
            $table->dropColumn('coupon');
        });
    }
};
