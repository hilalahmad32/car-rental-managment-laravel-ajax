<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Posts;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts=Posts::orderBy("id","DESC")->limit(20)->get();
        return view("customar.blog",["posts"=>$posts]);
    }

    public function detail($id)
    {
        $posts=Posts::find($id);
        $comment=Comments::where("post_id",$id)->get();
        return view("customar.blog-detail",["posts"=>$posts,"comments"=>$comment]);
    }
}