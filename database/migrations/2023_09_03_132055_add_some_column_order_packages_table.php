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
            $table->dropColumn('pac_last');
            $table->float('pac_offer')->default(0)->after('pac_gateway');
            $table->float('pac_rate')->default(0)->after('pac_offer');
            $table->float('pac_discount')->default(0)->after('pac_rate');
            $table->string('coupon')->default(0)->after('pac_discount');

            $table->string('pac_regular')->default('n/a')->after('coupon');
            $table->string('transaction_id')->default('n/a')->after('pac_gateway');
            $table->string('invoice_id')->default('n/a')->after('transaction_id');
            $table->string('sender_number')->default('n/a')->after('invoice_id');
            $table->string('tr_status')->default('n/a')->after('sender_number');
            $table->string('pacDetails')->default('n/a')->after('tr_status');
            $table->string('tr_date')->default('n/a')->after('pacDetails');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_packages', function (Blueprint $table) {
            $table->dropColumn('pac_offer');
            $table->dropColumn('pac_rate');
            $table->dropColumn('pac_rate');
            $table->dropColumn('pac_discount');
            $table->dropColumn('coupon');
            $table->dropColumn('transaction_id');
            $table->dropColumn('invoice_id');
            $table->dropColumn('sender_number');
            $table->dropColumn('tr_status');
            $table->dropColumn('pacDetails');
            $table->dropColumn('tr_date');
        });
    }
};
