<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{

    public function index()
    {
        $posts=Post::orderBy('date', 'DESC')->take(4)->get();
        $data=['posts'=>$posts];
        return view('index',$data);
    }

}
