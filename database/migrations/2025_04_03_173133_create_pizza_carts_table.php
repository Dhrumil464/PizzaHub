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
        Schema::create('pizza_carts', function (Blueprint $table) {
            $table->id('cartitemid');
            $table->foreignId('pizzaid');
            $table->foreignId('userid');
            $table->tinyInteger('quantity');
            $table->timestamp('itemadddate')->useCurrent();

            $table->foreign('pizzaid')->references('pizzaid')->on('pizza_items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('userid')->references('userid')->on('users_admins')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_carts');
    }
};
