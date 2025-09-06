<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('main_title', 150);
            $table->text('description');
            $table->json('list_about_us'); 
            $table->string('img_about')->nullable(); 
            $table->string('experience', 50);
            $table->string('number_about_us', 15);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
