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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('catid');
            $table->string('catname', 50);
            $table->string('catimage', 100);
            $table->string('catdesc', 200)->nullable();
            $table->tinyInteger('cattype');
            $table->tinyInteger('iscombo')->nullable();
            $table->decimal('comboprice', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->default(0);
            $table->timestamp('catcreatedate')->useCurrent();
            $table->timestamp('catupdatedate')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
