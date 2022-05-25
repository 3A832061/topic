@extends('layouts.partials.type')
@section('title','管樂社')
@section('index.con')
    <main class="flex-shrink-0">
        @include('layouts.nav')
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5">

                <div class="col-lg-9">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">{{$post->date}}</div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$post->tag}}</a>
                        </header>

                        <!-- Post content-->
                        <section class="mb-5">
                            <?php
                            $string=$post->content;
                            $cutchar = explode('\n', $string);
                            foreach ($cutchar as $item){
                                echo $item."<br>";
                            }
                            ?>
                        </section>
                        <!-- Preview image figure-->
                        {{ isset($post->link) ? "<figure class='mb-4'><img class='img-fluid rounded' src=$post->link alt='...' /></figure>" : ''}}
                    </article>
                </div>
            </div>
        </div>
    </section>
</main>

@if (Route::has('login'))
    @auth
    <a href={{route('posts.create')}} >新增公告</a>
    <a href={{route('posts.edit',$post->id)}}>修改公告</a>
    <form action="{{ route('posts.destroy',$post->id) }}" method="POST" style="display: inline">
        @method('DELETE')
        @csrf
        <button  class="btn btn-sm btn-danger" type="submit" onclick="javascript:return doubleCheck();">刪除</button>
    </form>
    @endauth
@endif

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

