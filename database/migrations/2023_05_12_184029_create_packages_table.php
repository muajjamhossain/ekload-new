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
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('pd_id');
            $table->string('pd_title');
            $table->string('pd_subtitle');
            $table->string('pd_data');
            $table->string('pd_minute');
            $table->string('pd_regular');
            $table->string('pd_offer');
            $table->string('pd_validity');
            $table->string('pd_type');
            $table->string('pd_operator');
            $table->string('pd_image');
            $table->string('pd_slug');
            $table->integer('creator');
            $table->integer('pd_reward')->default(0);
            $table->integer('pd_point')->default(0);
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->integer('pd_coupon')->default(0);
            $table->integer('pd_publish')->default(0);
            $table->integer('pd_check')->default(0);
            $table->integer('pd_status')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('SET NULL');

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
