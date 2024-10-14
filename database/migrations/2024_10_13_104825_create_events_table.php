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
            $table->bigInteger('organizer_id')->unsigned();
            $table->bigInteger('categories_id')->unsigned();
            
            $table->id();
            $table->string('title');
            $table->string('venue');
            $table->date('tanggal');
            $table->time('start_time');
            $table->longText('description');
            $table->string('booking_url')->nullable();
            $table->json('tags');
            $table->foreign('organizer_id')->references('id')->on('organizer')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('active')->default(1);
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