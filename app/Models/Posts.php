<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table="posts";
    protected $fillable=[
        "user_id","car_id","title","description","image"
    ];

    public function users(){
        return $this->belongsTo(User::class,"user_id");
    }

    public function category(){
        return $this->belongsTo(Category::class,"cat_id");
    }   
    public function comments(){
        return $this->hasMany(Comments::class);
    }
}