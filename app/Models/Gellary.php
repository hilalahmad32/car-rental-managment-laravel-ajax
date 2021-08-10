<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gellary extends Model
{
    use HasFactory;
    protected $table="gellaries";
    protected $fillable=["user_id","gallery"];

    public function users(){
        return $this->belongsTo(User::class,"user_id");
    }
}