<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_product_id')->constrained('category_products')->onDelete('cascade');
            $table->string('img_product')->nullable();
            $table->string('name_product', 255);
            $table->enum('state_offer', ['true', 'false'])->default('false');
            $table->decimal('not_offer_price', 8, 2);
            $table->decimal('offer_price', 8, 2)->nullable();
            $table->integer('star_quality')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
