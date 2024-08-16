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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key column named 'id'
            $table->string('title'); // Campaign title
            $table->text('description'); // Campaign description
            $table->decimal('goal_amount', 10, 2); // Goal amount with decimal precision
            $table->decimal('raised_amount', 10, 2)->default(0); // Amount raised, default to 0
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to 'users' table
            $table->enum('status', ['active', 'completed', 'failed'])->default('active'); // Campaign status
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns'); // Drops the 'campaigns' table if it exists
    }
};
