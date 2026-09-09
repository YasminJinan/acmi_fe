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
            $table->unsignedBigInteger('organizer_id')->nullable();
            $table->string('title', 200);
            $table->text('description')->nullable();
            $table->timestamp('starts_at');
            $table->string('location', 255);
            $table->string('type', 30);
            $table->string('image_emoji', 20)->nullable();
            $table->unsignedBigInteger('banner_media_id')->nullable();
            $table->integer('status')->default(1);
            $table->integer('attendees_count')->default(0);
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
