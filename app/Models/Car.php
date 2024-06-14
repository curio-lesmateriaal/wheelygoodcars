<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // Als de tabelnaam anders is dan de pluralized versie van het modelnaam
    protected $table = 'cars';

    // De eigenschappen die je wilt massaal toewijsbaar maken
    protected $fillable = [
        'user_id', 'license_plate', 'brand', 'model', 'price', 'mileage', 'seats',
        'doors', 'production_year', 'weight', 'color', 'image', 'sold_at', 'views'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
