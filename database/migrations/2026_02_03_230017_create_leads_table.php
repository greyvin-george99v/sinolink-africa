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
        
    // Connects the lead to the affiliate (user)
    Schema::create('leads', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The Affiliate
    $table->string('customer_name');
    $table->string('customer_phone');
    $table->string('customer_name');
    $table->string('country'); 
    $table->string('vehicle_interest'); 
    $table->enum('status', ['pending', 'sold', 'rejected'])->default('pending');
    $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
