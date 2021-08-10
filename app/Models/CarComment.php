<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarComment extends Model
{
    use HasFactory;
    protected $table="car_comments";

    protected  $fillable=["car_id","customar_id","review","comment"];

    public function cars(){
        return $this->belongsTo(Car::class,"car_id");
    }

    public function customars(){
        return $this->belongsTo(Customar::class,"customar_id");
    }
}