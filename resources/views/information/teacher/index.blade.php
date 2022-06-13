@extends('layouts.partials.type')
@section('title','管樂社')
<style>
    .col-lg-6
    {
      width:100%;
    }
    .img-fluid
    {
        text-align: right !important;
    }
    .col-lg-6.ass
    {
        text-align:center !important;
    }
     .col-lg-6
     {
         width:100%;

     }

    .img-fluid.rounded-3.mb-3
    {
        width:400px !important;
        height: 500px !important;
        background-color: #1e1e1e;
    }
    .btn.btn-outline-success.flex-shrink-0
    {
        color:#d7ad96 !important;
        border-color: #d7ad96 !important;
    }
    .btn.btn-outline-success.flex-shrink-0:hover
    {
        color:white !important;
        border-color: #d7ad96 !important;
        background-color: #d7ad96 !important;
    }

</style>
@section('index.con')
    <main class="flex-shrink-0">
        @include('layouts.nav')

    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">指導老師
                        @if ( auth()->check())
                            @if(auth()->user()->pos!='社員')
                                <a class="btn btn-success flex-shrink-0" href="{{route('teacher.create')}}">新增</a>
                            @endif
                        @endif
                        </h1>
                    </div>
                </div>

            </div>


            <div class="row gx-5">
                <ul style="float:left;">
                    @foreach($teachers as $info)
                    <li style="float:left;  width: 100px;">
                        <a href="#{{$info->id}}" class="aaa btn btn-default flex-shrink-0" >{{$info->title}}</a>
                    </li>
                    @endforeach
                </ul>
                <hr>
                @foreach($teachers as $info)
                    <div class="row gx-5" style="border-bottom: #2a2a2a;">
                        <section class="col-9" >
                            <a id="{{$info->id}}"></a>
                                <h2 style=' white-space:nowrap; !important;'>{{$info->title}}
                                    @if ( auth()->check())
                                        @if(auth()->user()->pos!='社員')
                                            <right> <a class='btn btn-outline-dark flex-shrink-0' href='{{route('teacher.edit',$info->id)}}' style=' white-space:nowrap; !important;'>編輯</a>
                                                <form action='{{ route('teacher.destroy',$info->id) }}' method='POST' style='display: inline;'>
                                                    @method('DELETE')
                                                    @csrf
                                                    <button  class='btn btn-outline-danger flex-shrink-0' type='submit'>刪除</button>
                                                </form> </right>
                                        @endif
                                    @endif
                                </h2>

                            <pre>{{$info->content}}</pre>
                        </section>
                        <div class="col-3">

                                <img class="img-fluid rounded-3" src="{{$info->picture}}"  />

                        </div>
                        </div>
                    <hr>
                @endforeach



            </div>
        </div>
    </section>
</main>
@include('layouts.footer')
@endsection
