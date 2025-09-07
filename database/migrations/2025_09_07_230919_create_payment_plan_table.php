<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_plan', function (Blueprint $table) {
            $table->id();
            $table->string('main_title', 150);
            $table->string('icon_img_payment_plan')->nullable(); 
            $table->string('name_plan', 100);
            $table->decimal('price_plan', 8, 2);
            $table->json('list_plan')->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_plan');
    }
};
