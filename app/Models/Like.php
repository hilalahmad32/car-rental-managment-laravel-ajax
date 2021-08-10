<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table="likes";

    protected $fillable=["car_id","cus_id","like"];

    public function like_customar()
    {
        return $this->belongsTo(Customar::class,"cus_id");
    }
    public function like_car()
    {
        return $this->belongsTo(Car::class,"car_id");
    }
}
