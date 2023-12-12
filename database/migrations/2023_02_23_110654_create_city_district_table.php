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
        Schema::create('city_districts', function (Blueprint $table) {
            $table->id();
            $table->string('name',500);
            $table->unsignedInteger('city_id')->index();
            $table->text('polygon');
            $table->double('coefficient')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_district');
    }
};
