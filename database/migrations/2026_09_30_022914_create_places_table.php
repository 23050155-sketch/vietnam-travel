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
       Schema::create('places', function (Blueprint $table) {
    $table->id();

    $table->foreignId('province_id')
        ->constrained('provinces')
        ->cascadeOnDelete();

    $table->string('name');

    $table->string('slug')->unique();

    $table->string('short_description')->nullable();

    $table->text('description')->nullable();

    $table->string('address')->nullable();

    $table->string('cover_image')->nullable();

    $table->string('status')->default('active');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
