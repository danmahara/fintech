<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id(); // Unsigned Big Integer (unsignedBigInteger)
            $table->string('title');
            $table->text('description');
            $table->decimal('goal_amount', 10, 2);
            $table->decimal('raised_amount', 10, 2)->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to 'users' table
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key to 'categories' table
            $table->enum('status', ['under review', 'pending', 'active', 'completed', 'failed'])->default('under review');
            $table->string('business_experience')->nullable();
            $table->string('idea_business_detail')->nullable();
            $table->timestamps();
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
