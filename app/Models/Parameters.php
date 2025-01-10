<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parameters extends Model
{
    // $table->id();
    // $table->string('name'); // заголовок
    // $table->string('value'); // заголовок
    // $table->integer('characteristic_id'); //Id продукта
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
        "characteristic_id",
        "value"
    ];
    protected $visible = [
        'id',
        'name',
        'created_at',
        "characteristic_id",
        "value"
    ];
    public function characteristic(): BelongsTo
    {
        return $this->belongsTo(Characteristics::class,"characteristic_id", "id");
    }
}