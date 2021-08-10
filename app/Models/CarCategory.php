<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarCategory extends Model
{
    use HasFactory;
    protected $table="car_categories";
    protected $fillable=[
        'car_cat_name',
        'car_image',
    ];

    public function cars(){
        return $this->hasMany(Car::class);
    }
}