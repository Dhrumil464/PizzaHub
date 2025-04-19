<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('orderid', 10)->unique(); // 5-digit unique order ID
            $table->foreignId('userid'); // assuming FK to users table
            $table->string('fullname', 30);
            $table->string('email', 30);
            $table->string('address', 50);
            $table->string('zip', 10);
            $table->string('phoneno', 15);
            $table->decimal('totalfinalprice', 10, 2);
            $table->decimal('discountedtotalprice', 10, 2);
            $table->tinyInteger('paymentmethod'); // 1 = COD, 2 = Online
            $table->tinyInteger('orderstatus')->default(1);
            $table->timestamp('orderdate')->useCurrent();

            $table->foreign('userid')->references('userid')->on('users_admins')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
