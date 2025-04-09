<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('orderitemid');
            $table->string('orderid', 10);
            $table->tinyInteger('pizzaid');
            $table->tinyInteger('quantity');

            $table->foreign('orderid')->references('orderid')->on('orders')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
