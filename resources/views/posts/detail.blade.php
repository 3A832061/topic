@extends('layouts.partials.type')
@section('title','管樂社')
<style>
    .content {
        margin: auto;
        width: 50%;
        margin-top: 5%;
        margin-bottom: 5%;
    }

    @media screen and (max-width: 830px) {
        .content {
            width: 70%;
        }
    }
</style>
@section('index.con')

        @include('layouts.nav')
    <section  class="content" style="border: 2px solid;border-radius: 50px 50px 30px 30px;box-shadow: 5px 10px 5px #888888;">
            <article>
                <div style="float: right;padding-top: 10px;padding-right: 5%;">
                    @if ( auth()->check())
                        @if(auth()->user()->pos!='社員')
                            <a style="display: block;width: 90px;"  class="btn btn-primary" href={{route('posts.create')}} >新增公告</a>
                            <a style="display: block;width: 90px;"  class="btn  btn-success" href={{route('posts.edit',$post->id)}}>修改公告</a>
                            <form action="{{ route('posts.destroy',$post->id) }}" method="POST" style="display: inline" onsubmit="javascript:return doubleCheck();">
                                @method('DELETE')
                                @csrf
                                <button  style="display: block;width: 90px;"  class="btn  btn-danger" type="submit" >刪除</button>
                            </form>
                        @endif
                    @endif
                </div>
            </article>

            <div style="padding: 30px;">
                <h1 class="fw-bolder mb-1" style="white-space: pre-wrap;  word-wrap: break-word;">{{$post->title}}</h1>
                <a class="badge bg-secondary text-decoration-none link-light" href={{route('posts.index',$post->tag)}}>{{$post->tag}}</a>
            </div>
            <div style=" padding: 20px;">
                <p style="color: black; font-style:italic;">{{$post->date}}</p>
                <div style="padding: 10px 20px 30px 10px;];">
                    <pre style="font-size: 14px; white-space: pre-wrap;  word-wrap: break-word;">{{$post->content}}</pre>
                </div>
                @if($post->link!=null)
                    <img  width="100%;" src={{asset("images/posts/".$post->link)}} alt='...' />
                @endif

            </div>

    </section>

    @include('layouts.footer')
    <script>
        function doubleCheck(){
            var msg = "您真的確定要刪除嗎？\n\n請確認！";
            if (confirm(msg)==true){
                return true;
            }else{
                return false;
            }
        }
    </script>
@endsection

