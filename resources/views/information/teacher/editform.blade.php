@extends('layouts.partials.type')
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
        pre {
            white-space: nowrap;
            word-wrap: break-word;
            font-size: 15px !important;
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
    <!-- 獎項-->
    <h1 style="padding-top: 5%;text-align: center;">修改老師資料</h1>
    <br>
    <div class="content">
        <form action="{{route('teacher.update',$Information->id)}}" method="POST" role="form">
            @csrf
            <div class="form-group">
                <label for="title" class="inline">指導老師名稱：</label>
                <input name="title" class="form-control-itemname" placeholder="" value="{{old('title',$Information->title)}}">
            </div>

            <div class="form-group" >
                <label for="content" class="inline">老師介紹：</label>
                <textarea name="content" class="form-control-itemname" style=" white-space: pre;height: 150px;">{{old('content',$Information->content)}}</textarea>
            </div>

            <div class="form-group">
                <label for="url" class="inline">圖片網址：</label>
                <input id="url" name="url" class="form-control-itemname"  placeholder="請輸入連結網址" value="{{old('picture',$Information->picture)}}">
            </div>

            <div class="text-right">
                <button style="float: right;" type="submit" class="btn btn-primary">儲存</button>
            </div>
        </form>
    </div>

    @include('layouts.footer')
@endsection
