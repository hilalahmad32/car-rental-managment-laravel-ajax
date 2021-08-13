<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function index()
    {
        $likes = Like::orderBy("id", "DESC")->get();
        return view("admin.likes",["likes"=>$likes]);
    }
}
