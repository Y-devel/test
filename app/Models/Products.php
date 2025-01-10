<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Products extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'theses' => 'array',
        'machine_overview_designation' => 'array'
    ];
    protected $fillable = [
        'name',
        'description',
        'main_img',
        'created_at',
        "categories_id",
        "theses",
        "machine_overview_designation",
        "machine_overview_designation_img"
    ];
    protected $visible = [
        'id',
        'name',
        'description',
        'main_img',
        'created_at',
        "categories_id",
        "theses",
        "machine_overview_designation",
        "machine_overview_designation_img"
    ];
    protected $attributes = [
        'theses' => "",
        'main_img'=>"",
        'description'=>"",
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class,"categories_id", "id");
    }
    public function advantages(): HasMany
    {
        return $this->hasMany(Advantages::class,"product_id");
    }
    public function peculiarities(): HasMany
    {
        return $this->hasMany(Peculiarities::class,"product_id");
    }
    
    public function characteristics(): HasMany
    {
        return $this->hasMany(Characteristics::class,"product_id");
    }
    public function autoproducts(): HasMany
    {
        return $this->hasMany(AutoProducts::class,"product_id");
    }
}
