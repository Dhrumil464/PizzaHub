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
        Schema::create('delivery_boy_details', function (Blueprint $table) {
            $table->id('dbid');
            $table->string('deliveryboyname', 30);
            $table->string('deliveryboyphoneno', 10);
            $table->string('deliveryboyemail', 30)->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_boy_details');
    }
};
