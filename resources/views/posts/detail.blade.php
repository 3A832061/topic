@extends('layouts.partials.type')


@section('title','管樂社')
<style>

</style>
@section('index.con')
    <main class="flex-shrink-0">
        @include('layouts.nav')
    <section class="py-5" >
        <div style="padding-left: 25%;padding-right: 10%">

            <div class="row gx-5">
                <div class="col-lg-9">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <div style="text-align:right;">
                                @if ( auth()->check())
                                    @if(auth()->user()->pos!='社員')
                                    <a class="btn btn-primary" href={{route('posts.create')}} >新增公告</a>
                                    <a class="btn  btn-success" href={{route('posts.edit',$post->id)}}>修改公告</a>
                                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST" style="display: inline">
                                        @method('DELETE')
                                        @csrf
                                        <button  class="btn  btn-danger" type="submit" onclick="javascript:return doubleCheck();">刪除</button>
                                    </form>
                                    @endif
                                @endif
                            </div>
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1" style=" white-space: pre-wrap;  word-wrap: break-word;">{{$post->title}}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2" style="">{{$post->date}}</div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href={{route('posts.index',$post->tag)}}>{{$post->tag}}</a>
                        </header>

                        <!-- Post content-->
                        <section class="mb-5" id="content" >
                            <pre style=" white-space: pre-wrap;  word-wrap: break-word;">{{$post->content}}</pre>
                        </section>
                        <!-- Preview image figure-->
                        <figure class='mb-4'>
                            @if($post->link!=null)
                                <img class='img-fluid rounded' src={{asset("images/posts/".$post->link)}} alt='...' />
                            @endif
                        </figure>
                    </article>
                </div>
            </div>

        </div>

    </section>
</main>


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

