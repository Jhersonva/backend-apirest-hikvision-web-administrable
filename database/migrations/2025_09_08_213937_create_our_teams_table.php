<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('our_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_specialty_category')->constrained('specialty_categories')->onDelete('cascade');
            $table->string('img_our_team')->nullable();
            $table->string('name_employee', 250);
            $table->string('contact_value_whatsapp', 9);
            $table->string('contact_url_whatsapp');
            $table->string('contact_value_celular', 9);
            $table->string('contact_url_celular');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('our_teams');
    }
};
