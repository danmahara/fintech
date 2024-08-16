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
        Schema::create('donations', function (Blueprint $table) {
            $table->id(); // Primary key 'id'
            $table->foreignId('campaign_id') // Foreign key to 'campaigns' table
                  ->constrained('campaigns') // Specifies the table and column to reference
                  ->onDelete('cascade'); // Automatically delete donations if the associated campaign is deleted
            $table->foreignId('user_id') // Foreign key to 'users' table
                  ->constrained('users') // Specifies the table and column to reference
                  ->onDelete('cascade'); // Automatically delete donations if the associated user is deleted
            $table->decimal('amount', 10, 2); // Amount of the donation
            $table->text('description')->nullable(); // Optional description
            $table->date('date'); // Date of the donation
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation');
    }
};
