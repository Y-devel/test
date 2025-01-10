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
        Schema::create('auto_characteristics', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // заголовок
            $table->integer('auto_product_id')->nullable(); //Id продукта
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_characteristics');
    }
};