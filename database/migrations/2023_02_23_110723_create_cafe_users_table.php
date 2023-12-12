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
        Schema::create('cafe_users', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('phone',50);
            $table->string('position',50);
            $table->unsignedInteger('cafe_id')->index();
            $table->string('password',500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cafe_users');
    }
};
