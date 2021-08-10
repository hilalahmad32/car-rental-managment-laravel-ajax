<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table="comments";
    protected $fillable=["customar_id","post_id","comment"];

    public function posts(){
        return $this->belongsTo(Posts::class,"post_id");
    }

    public function blog_customars(){
        return $this->belongsTo(Customar::class,"customar_id");
    }
}