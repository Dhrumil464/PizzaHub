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
            $table->string('catname', 30);
            $table->string('catimage',100);
            $table->string('catdesc',60)->nullable();
            $table->integer('cattype')->unsigned();
            $table->integer('iscombo')->unsigned()->nullable();
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
