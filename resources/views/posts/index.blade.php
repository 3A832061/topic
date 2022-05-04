@extends('layouts.partials.type')
@section('title','管樂社')
@section('index.con')
    <main class="flex-shrink-0">
    @include('layouts.nav')
    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <h3 align="center">所有公告</h3>
            <table align="center" style="color: black" border="5" width="75%">
                <tr>
                    <td>日期</td>
                    <td></td>
                    <td>標題</td>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->date}}</td>
                        <td></td>
                        <td> <a style="text-decoration:none;color: black;" href={{route('posts.show',$post->id)}}>{{$post->title}}</a></td>
                    </tr>
                @endforeach
            </table>
            <br>

            @if (Route::has('login'))
                @auth
            <a href={{route('posts.create')}}>新增公告</a>
            @endauth
            @endif

        </div>
</main>
    @include('layouts.footer')
@endsection
