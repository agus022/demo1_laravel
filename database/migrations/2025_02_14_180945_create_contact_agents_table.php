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
        Schema::create('contact_agents', function (Blueprint $table) {
            $table->id();
            $table->string("name",255);
            $table->string("email",50);
            $table->string("phone",12);
            $table->text("message");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_agents');
    }
};
