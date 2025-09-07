<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('information_contact', function (Blueprint $table) {
            $table->id();
            $table->string('img_information_contact')->nullable();
            $table->string('main_title', 150);
            $table->text('description');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('information_contact');
    }
};
