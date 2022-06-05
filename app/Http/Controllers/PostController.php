<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index($tag='全部公告')
    {
        if($tag=='全部公告') {
            $posts = Post::orderBy('date', 'ASC')->get();
            $tag=["tag"=>$tag];
        }
        else{
            $posts = Post::where('tag', '=',$tag)->get();
            $tag=['tag'=>$tag];
        }
        $data = ['posts' => $posts];
        return view('posts.index',$data,$tag);
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

    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        if($request->hasFile('link')) {
            $imageName = time().'.'.$request->link->extension();
            //把檔案存到公開的資料夾
            $request->link->move(public_path('images/posts'), $imageName);
            DB::table('posts')->insert([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'date' => date('Y/m/d'),
                'link'=> $imageName,
                'tag' => $_POST['tag'],
                'user_id' => auth()->user()->id]);
        }
        else{
            DB::table('posts')->insert([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'date' => date('Y/m/d'),
                'tag' => $_POST['tag'],
                'user_id' => auth()->user()->id]);
        }

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.editform')->with('post',$post);
    }

    public function update($id,PostRequest $request)
    {
        $validated = $request->validated();

        $recipe=Post::find($id);

        if($request->hasFile('link')) {
            $imageName = time().'.'.$request->link->extension();
            //把檔案存到公開的資料夾
            $request->link->move(public_path('images/posts'), $imageName);
            $recipe->title=$request->title;
            $recipe->content=$request->content;
            $recipe->date=date('Y/m/d');
            $recipe->link=$imageName;
            $recipe->tag=$request->tag;
            $recipe->user_id = auth()->user()->id;
            $recipe->save();
        }
        else{
            if($request->link_del!=null) {
                $recipe->update($request->all());
                $recipe->link=null;
                $recipe->save();
            }
            else{
                $recipe->update($request->all());
            }
        }

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index');
    }
}
