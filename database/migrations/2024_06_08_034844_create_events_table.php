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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courses_id')->constrained();
            $table->foreignId('categories_id')->constrained();
            $table->foreignId('tags_id')->constrained();
            $table->foreignId('users_id')->nullable()->constrained();
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->boolean('status');
            $table->text('description');
            $table->string('image');
            $table->decimal('percentage')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
