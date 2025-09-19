<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('video_information_and_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('url_video_yt')->nullable();
            $table->string('icon_img')->nullable();
            $table->string('name_information_solution', 100);
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('video_information_and_solutions');
    }
};
