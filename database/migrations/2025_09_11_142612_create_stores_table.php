<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_product_id')->constrained('category_products')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('img_store_discount')->nullable(); 
            $table->integer('range_price_start');  
            $table->integer('range_price_end');    
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stores');
    }
};