<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function create()
    {
        return view('posts.createform');
    }

    public function store(Request $request)
    {
        if($_POST['link']=='') {
            DB::table('posts')->insert([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'date' => date('Y/m/d'),
                'publi' => auth()->user()->name]);
        }
        else{
            DB::table('posts')->insert([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'date' => date('Y/m/d'),
                'link' => $_POST['link'],
                'publi' => auth()->user()->name]);
        }

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.editform')->with('post',$post);
    }

    public function update($id,Request $request)
    {
        $recipe=Post::find($id);

        $recipe->update($request->all());

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index');
    }
}
