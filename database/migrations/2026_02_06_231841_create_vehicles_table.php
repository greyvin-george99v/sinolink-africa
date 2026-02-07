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
        Schema::create('vehicles', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug')->unique();
        $table->decimal('price', 10, 2);
        $table->string('year');
        $table->string('km');
        $table->string('fuel');
        $table->string('color')->nullable();
        $table->string('trans');
        $table->string('image')->default('default.jpg');
        $table->text('desc')->nullable();
        $table->boolean('is_sold')->default(false); // Your core rule
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
