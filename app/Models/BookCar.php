<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCar extends Model
{
    use HasFactory;
    public function book_car()
    {
        return $this->belongsTo(Car::class,"car_id");
    }
    public function customar_books()
    {
        return $this->belongsTo(Customar::class,"customar_id");
    }
}
