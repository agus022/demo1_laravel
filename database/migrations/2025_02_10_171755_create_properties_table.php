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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('address', 100);
            $table->text('description');
            $table->smallInteger('bedrooms');
            $table->smallInteger('bathrooms');
            $table->integer('price');
            $table->foreignId('property_listing_type_id')->constrained('property_listing_type')->onDelete('cascade');
            $table->enum('offer_type', ['For Sale', 'For Rent', 'For Lease']);
            $table->integer('sq_ft');
            $table->unsignedSmallInteger('year_built');
            $table->json('images')->default(json_encode([]));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
