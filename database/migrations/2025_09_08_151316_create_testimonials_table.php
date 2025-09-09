<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('img_testimonial')->nullable();
            $table->string('name_testimonials', 250);
            $table->string('type_testimonials', 150)->nullable(); 
            $table->text('coment_testimonials');
            $table->unsignedTinyInteger('qualification')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
