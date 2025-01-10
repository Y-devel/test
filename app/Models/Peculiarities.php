<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peculiarities extends Model
{
    // $table->id();
    // $table->string('name'); // заголовок
    // $table->string('main_img'); // Главное изображение
    // $table->integer('product_id'); //Id продукта
    // $table->text('description'); // описание
    // $table->timestamps(); 
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'theses' => 'array',
    ];
    protected $fillable = [
        'name',
        'description',
        'main_img',
        'created_at',
        "product_id",
    ];
    protected $visible = [
        'id',
        'name',
        'description',
        'main_img',
        'created_at',
        "product_id",
    ];
    protected $attributes = [
        'main_img'=>"",
        'description'=>"",
    ];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class,"product_id", "id");
    }
}
