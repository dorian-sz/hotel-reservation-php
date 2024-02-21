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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->decimal('cost');
            $table->boolean('available')->default(1);
            $table->timestamps();
            $table->foreignIdFor(\App\Models\Reservation::class)->nullable()->references('id')->on('reservations')->onDelete("SET NULL");
            $table->foreignIdFor(\App\Models\Size::class)->nullable()->references('id')->on('sizes')->onDelete("SET NULL");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
