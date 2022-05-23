@extends('layouts.partials.type')
@section('form.css')
<style>
    .product-buyer-name {
        max-width: 110px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
@endsection
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
                    <td style="width: 10%;"></td>
                    <td style="width: 20%;">日期</td>
                    <td style="width: 45%;">標題</td>
                    @if (Route::has('login'))
                        @auth
                    <td style="width: 15%;"></td>
                    <td style="width: 10%;"></td>
                        @endauth
                    @endif
                </tr>
                @foreach($posts as $post)
                    <tr>
                            <td >
                                <a style="text-decoration:none;color: black;" href={{route('posts.index',$post->tag)}}>
                                    {{$post->tag}}
                                </a>
                            </td>
                            <td >{{$post->date}}</td>
                            <td class="product-buyer-name">
                                <a style="text-decoration:none;color: black;" href={{route('posts.show',$post->id)}}>
                                    {{$post->title}}
                                </a>
                            </td>

                        @if (Route::has('login'))
                        @auth
                            <td>
                                <a class="btn btn-sm btn-danger" href={{route('posts.edit',$post->id)}}>修改公告</a>
                            </td>
                            <td >
                                <form action="{{ route('posts.destroy',$post->id) }}" method="POST" style="display: inline">
                                    @method('DELETE')
                                    @csrf
                                    <button  class="btn btn-sm btn-danger" type="submit">刪除</button>
                                </form>
                            </td>
                        @endauth
                        @endif
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
