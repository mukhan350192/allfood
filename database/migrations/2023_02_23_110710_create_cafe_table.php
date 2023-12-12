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
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('city_id')->index();
            $table->boolean('status')->default(false);
            $table->boolean('online_status')->default(false);
            $table->string('name', 500);
            $table->string('image', 500);
            $table->string('login',500);
            $table->string('password',500);
            $table->double('rating')->default(5);
            $table->unsignedInteger('rating_count')->default(0);
            $table->string('latitude', 500);
            $table->string('longitude', 500);
            $table->integer('min_order')->nullable();
            $table->integer('delivery_price')->default(0);
            $table->string('time_delivery', 500);
            $table->double('percent')->default(5);
            $table->double('bonus')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cafe');
    }
};
