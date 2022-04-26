<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::orderBy('date', 'DESC')->get();
        $data=['posts'=>$posts];
        return view('posts.index',$data);
    }

    public function show($id)
    {
        $post=Post::find($id);
        $data1=['post'=>$post];
        return view('posts.detail',$data1);
    }
}
