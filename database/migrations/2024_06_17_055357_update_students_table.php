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
        // First, drop the existing 'status' column if it exists
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        // Add 'status' column as enum with specific options and default value 'pending'
        Schema::table('students', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->after('employment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'status' enum column in the down method
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        
        // Re-add the boolean 'status' column if necessary
        Schema::table('students', function (Blueprint $table) {
            $table->boolean('status')->default(0)->after('employment');
        });
    }
};
