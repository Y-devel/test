<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // название станка
            $table->string('theses')->nullable(); // тезисы
            $table->text('machine_overview_designation')->nullable(); // обзор станка
            $table->string('machine_overview_designation_img')->nullable(); // изображение
            $table->string('main_img')->nullable(); // Главное изображение
            $table->integer('categories_id'); //Id категории
            $table->text('description')->nullable(); // описание
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};