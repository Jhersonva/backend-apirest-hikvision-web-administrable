<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('choose_us', function (Blueprint $table) {
            $table->id();
            $table->string('main_title', 150);
            $table->text('description');
            $table->string('icon_img_choose_us')->nullable();
            $table->json('list_choose_us')->nullable();
            $table->string('img_choose_us')->nullable();
            $table->string('note', 50)->nullable();
            $table->json('note_list')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('choose_us');
    }
};
