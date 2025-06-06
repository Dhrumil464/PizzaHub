<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id('contactId');
            $table->foreignId('userid')->constrained('users_admins', 'userid')->onDelete('cascade');
            $table->string('orderid', 10)->default('0');
            $table->string('email', 30);
            $table->bigInteger('phoneno');
            $table->string('message', 200);
            $table->timestamp('contactdate')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
