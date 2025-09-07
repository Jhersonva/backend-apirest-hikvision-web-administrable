<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_category_id')->constrained('portfolio_categories')->onDelete('cascade'); 
            $table->string('main_title', 150);
            $table->string('img_portfolio')->nullable();
            $table->string('name_portfolio', 150);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
