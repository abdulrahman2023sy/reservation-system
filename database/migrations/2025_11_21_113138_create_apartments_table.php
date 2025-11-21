<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();

            // Owner of apartment
            $table->foreignId('owner_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('title');
            $table->text('description')->nullable();
            $table->string('address');
            $table->string('city');

            // Map coordinates
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);

            $table->decimal('price_per_night', 8, 2);

            // Approval workflow
            $table->enum('status', ['pending', 'approved', 'rejected'])
                ->default('pending');

            // Admin who reviewed the apartment
            $table->foreignId('admin_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->text('review_comment')->nullable();

            $table->timestamps();

            // Index for fast map queries
            $table->index(['latitude', 'longitude']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
