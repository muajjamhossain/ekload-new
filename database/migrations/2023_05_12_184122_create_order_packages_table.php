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
        Schema::create('order_packages', function (Blueprint $table) {
            $table->bigIncrements('pac_id');
            $table->integer('pac_user_id');
            $table->integer('pac_pd_id');
            $table->integer('pac_phone');
            $table->integer('pac_last');
            $table->string('pac_gateway');
            $table->string('pac_slug');
            $table->integer('pac_publish')->default(0);
            $table->integer('pac_status')->default(1);
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_packages');
    }
};
