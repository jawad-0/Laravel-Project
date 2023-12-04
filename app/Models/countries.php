<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'short_a',
        'long_a',
        'region',
        'area',
        'population',
        'image'

    ];

    // protected function data(): Attribute{
    //     return Attribute::make(
    //         get: fn ($value) => json_decode($value,true),
    //         set: fn ($value) => json_encode($value),
    //     );
    // } 
}
