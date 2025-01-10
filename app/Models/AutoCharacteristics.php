<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AutoCharacteristics extends Model
{
    // $table->id();
    // $table->string('name'); // заголовок
    // $table->integer('product_id'); //Id продукта
    // $table->timestamps(); 
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'created_at',
        "auto_product_id",
    ];
    protected $visible = [
        'id',
        'name',
        'created_at',
        "auto_product_id",
    ];
    
    protected $attributes = [
        "name" => ""
    ];
    public function product(): BelongsTo
    {
        return $this->belongsTo(AutoProducts::class,"auto_product_id", "id");
    }
    public function autoparameters(): HasMany
    {
        return $this->hasMany(AutoParameters::class,"auto_characteristic_id", "id");
    }
}
