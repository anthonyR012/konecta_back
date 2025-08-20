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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('origin',3);
            $table->string('destination',3);
            $table->timestamp('departure_at');
            $table->unsignedInteger('seats_total');
            $table->unsignedInteger('seats_available');
            $table->decimal('price',10,2);
            $table->string('icon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
