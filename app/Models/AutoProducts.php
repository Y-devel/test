<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AutoProducts extends Model
{
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
        "theses"
    ];
    protected $visible = [
        'id',
        'name',
        'description',
        'main_img',
        'created_at',
        "product_id",
        "theses"
    ];
    protected $attributes = [
        'theses' => "",
        'main_img'=>"",
        'description'=>"",
    ];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class,"product_id", "id");
    }
    public function autocharacteristics(): HasMany
    {
        return $this->hasMany(AutoCharacteristics::class,"auto_product_id");
    }
}
