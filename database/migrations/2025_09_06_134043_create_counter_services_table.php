<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('counter_services', function (Blueprint $table) {
            $table->id();
            $table->string('main_img')->nullable();
            $table->string('icon_img')->nullable();
            $table->string('counter', 10);
            $table->string('name_counter_services', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('counter_services');
    }
};
