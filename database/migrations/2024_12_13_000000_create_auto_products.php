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
        Schema::create('auto_products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // название станка
            $table->string('theses')->nullable(); // тезисы
            $table->string('main_img')->nullable(); // Главное изображение
            $table->integer('product_id')->nullable(); //Id продукта
            $table->text('description')->nullable(); // описание
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_products');
    }
};