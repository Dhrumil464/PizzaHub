<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('delivery_details', function (Blueprint $table) {
            $table->id('deliveryid');
            $table->string('orderid', 10);
            $table->foreignId('dbid');
            $table->string('deliverytime',5)->nullable(); // in minutes
            $table->string('trackid', 10)->unique();
            $table->dateTime('deliverydate')->useCurrent();

            $table->foreign('orderid')->references('orderid')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dbid')->references('dbid')->on('delivery_boy_details')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery_details');
    }
};
