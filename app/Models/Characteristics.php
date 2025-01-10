<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Characteristics extends Model
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
        "product_id",
    ];
    protected $visible = [
        'id',
        'name',
        'created_at',
        "product_id",
    ];
    public function parameters(): HasMany
    {
        return $this->hasMany(Parameters::class, "characteristic_id");
    }
}
