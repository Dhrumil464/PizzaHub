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
        Schema::create('users_admins', function (Blueprint $table) {
            $table->id();
            $table->string('username', 15);
            $table->string('firstname', 25);
            $table->string('lastname', 25);
            $table->string('email', 30);
            $table->bigInteger('phoneno')->unique();
            $table->integer('usertype')->unsigned();
            $table->string('password', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_admins');
    }
};
