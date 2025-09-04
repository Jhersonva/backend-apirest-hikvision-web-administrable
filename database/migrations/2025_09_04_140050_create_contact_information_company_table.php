<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_information_company', function (Blueprint $table) {
            $table->id();
            $table->string('company_logo')->nullable();
            $table->text('description_company')->nullable();
            $table->string('address', 250)->nullable();
            $table->string('cell_phone_number', 15)->nullable();
            $table->string('email', 250)->nullable();
            $table->string('open_time', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_information_company');
    }
};
