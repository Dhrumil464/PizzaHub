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
        Schema::create('pizza_items', function (Blueprint $table) {
            $table->id('pizzaid');
            $table->string('pizzaname');
            $table->decimal('pizzaprice', 8, 2);
            $table->string('pizzaimage');
            $table->integer('pizzasize');
            $table->string('pizzatype')->default('veg');
            $table->text('pizzadesc')->nullable();
            $table->unsignedBigInteger('catid');
            $table->timestamp('pizzacreatedate')->useCurrent();
            $table->timestamp('pizzaupdatedate')->useCurrent();

            $table->foreign('catid')->references('catid')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_items');
    }
};
