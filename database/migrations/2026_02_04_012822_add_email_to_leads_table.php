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
        Schema::table('leads', function (Blueprint $table) {
           $table->string('customer_email')->nullable()->after('customer_name');
        // If 'status' isn't in your 'create_leads_table' migration, add it here too:
        if (!Schema::hasColumn('leads', 'status')) {
            $table->string('status')->default('pending');
        }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            //
        });
    }
};
