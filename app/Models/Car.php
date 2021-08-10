<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table="cars";
    protected $fillable=[
        "user_id",
        "car_cat_id",
        "car_name",
        "car_desc",
        "car_image",
        "car_price"
    ];

    public function users(){
        return $this->belongsTo(User::class,"user_id");
    }

    public function car_category(){
        return $this->belongsTo(CarCategory::class,"car_cat_id");
    }

    public function comments(){
        return $this->hasMany(CarComment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function books()
    {
        return $this->hasMany(BookCar::class);
    }
}