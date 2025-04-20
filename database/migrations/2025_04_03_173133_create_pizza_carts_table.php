<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pizza_carts', function (Blueprint $table) {
            $table->id('cartitemid');
            $table->foreignId('pizzaid')->nullable();
            $table->foreignId('catid')->nullable();
            $table->foreignId('userid');
            $table->tinyInteger('quantity');
            $table->timestamp('itemadddate')->useCurrent();

            $table->foreign('userid')->references('userid')->on('users_admins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pizzaid')->references('pizzaid')->on('pizza_items')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pizza_carts');
    }
};
