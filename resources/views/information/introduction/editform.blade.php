@extends('layouts.partials.type')
@section('title','管樂社')
@section('form.css')
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">

    <style>
        .row
        {padding-left:50px !important;}
        .mt-4
        {padding-left: 35px;}
        /*--*/
        .form-control-itemname
        {
            width: 70%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 5%;
        }
        .inline{
            text-align: center;
            padding: 12px 12px 12px 0;
            width: 20%;

            display: inline-block;
        }
        .form-group
        {
            width: 100%;
            float: left;
            margin-bottom: 15px !important;
        }
        #layoutSidenav_content
        {
            margin-left:200px !important;
            margin-bottom:100px !important;
        }
        .content {
            margin:auto;
            width: 60%;
            background-color: #f2f2f2;
            margin-bottom: 5%;
            padding: 30px;
            border-radius: 20px 20px 20px 20px;
        }

        @media screen and (max-width: 742px) {
            .form-control-itemname, .inline {
                text-align: left;
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
@endsection
@section('index.con')
    @include('layouts.nav')

    <h1 style="padding-top: 5%;text-align: center;">修改簡介</h1>
    <br>
    <main class="content" >
        <form action="{{route('introduction.update',$introduction->id)}}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="inline">標題：</label>
                <input name="title" required class="form-control-itemname" placeholder="請輸入標題" value="{{ $introduction->title}}">
            </div>

            <div class="form-group">
                <label for="content" class="inline">內容：</label>
                <textarea id="content" name="content" class="form-control-itemname" rows="10" style="height: 150px; overflow: auto;overflow-y: auto; white-space: pre;" required>{{$introduction->content}}</textarea>
            </div>

            <div class="form-group">
                <label for="picture" class="inline">附件</label>
                <input type="file" name="picture" accept="image/*" >
            </div>

            <div class="text-right" style="text-align:right;">
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
        </form>
        <h3>目前附件：</h3>
        <figure class='mb-4'>
            @if($introduction->picture!=null)
                <img style="max-width: 40%;" class='img-fluid rounded' src={{asset("images/introduction/".$introduction->picture)}} alt='...' />
            @else
                <p style="padding-left: 80px;">無附件</p>
            @endif
        </figure>
    </main>

    @include('layouts.footer')
@endsection
