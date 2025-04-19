<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_replies', function (Blueprint $table) {
            $table->id('replyId');
            $table->foreignId('contactId')->constrained('contacts', 'contactId');
            $table->foreignId('userid')->constrained('users_admins', 'userid')->onDelete('cascade');
            $table->string('message', 100);
            $table->timestamp('contactdate')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_replies');
    }
};
