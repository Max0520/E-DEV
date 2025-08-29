<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->constrained()->onDelete('cascade'); // Lien avec Contact
            $table->text('message');
            $table->enum('sender', ['admin', 'client'])->default('admin'); // Qui a envoyé le message
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_replies');
    }
};
