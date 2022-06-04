@extends('layouts.partials.type')
@section('title','管樂社')
@section('form.css')
    <style>
        #myBtn {
            display: block;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #4e7bff;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }

        #myBtn:hover {
            background-color: #555;
        }

        post{
            width: 100px;

        }
    </style>
    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
@endsection
@section('index.con')
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>

    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <main class="flex-shrink-0">
    @include('layouts.nav')
    <!-- 公告-->
        <header class="bg-dark py-5">
            <div style="padding-left: 10%;padding-right: 10%;">
                <div class="row  align-items-center ">
                    <div class="col-xl-6">
                        <div class="my-5 text-center ">
                            <h3 style="color: white">最新公告</h3>
                            @if(count($posts)==0)
                                <p style="color: white">暫無公告</p>
                            @else
                                <table style="color: white;table-layout:fixed;" border="5" width="100%">
                                    <tr>
                                        <td style="width: 120px;">類別</td>
                                        <td style="width: 120px;">日期</td>
                                        <td >標題</td>
                                    </tr>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td style="width: 120px;"><a style="text-decoration:none;color: white;" href={{route('posts.index',$post->tag)}}>{{$post->tag}}</a></td>
                                            <td style="width: 120px;">{{$post->date}}</td>
                                            <td style=" overflow:hidden;text-overflow:ellipsis;white-space: nowrap;">
                                                <a  style=" text-decoration:none;color: white;" href={{route('posts.show',$post->id)}}>
                                                    {{$post->title}}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                            <br>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center ">
                                <a class="btn btn-outline-light btn-lg px-4" href={{route('posts.index')}} >查看全部公告</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-7 d-none d-xl-block text-center">
                        <img class="img-fluid rounded-3 my-5" src="https://i.imgur.com/IZxt0CO.jpg" />
                    </div>
                </div>
            </div>
        </header>
        <!-- 行事曆-->
        <section class="py-5" id="features">
            <div class="container px-5 my-5">
            <div style=" position: relative;width: 100%;overflow: hidden;padding-top: 56.25%;">
                <iframe style="position:absolute;top: 0;left: 0; bottom: 0; right: 0; width: 100%; height: 100%; border: none;" src="https://www.youtube.com/embed/Z5XWRjEPtCQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            </div>
        </section>

        <div class="py-5 bg-light">
            <div class="container px-5 my-5">
                <iframe  src="https://calendar.google.com/calendar/embed?src=nplmeq6n7tjdov4ttr5fo5lajg%40group.calendar.google.com&ctz=Asia%2FTaipei" style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
            </div>
        </div>


    </main>
    @include('layouts.footer')
@endsection
