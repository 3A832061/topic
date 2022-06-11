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
            display: inline;
            width: 60%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group
        {
            margin-bottom: 15px !important;
        }
        #layoutSidenav_content
        {
            margin-left:200px !important;
            margin-bottom:100px !important;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#ch").on('click',function(){
                var user=$('#user').text(),title=$('#title').val();
                $.ajax({
                    type: "post",
                    data: {
                        "msg":title,
                        "user":user
                    },
                    url: "https://script.google.com/macros/s/AKfycbxwjZzQTPGn8Tl8tqVeLktolYG3Nz0nhBV5EK4bA4gxH9vUrX3qBXDesz6GZ4LHtJVNPA/exec",
                });
                $("#form1").submit();
            });
        });
    </script>
<script>
    function success(){
        alert('成功新增');
    }
</script>
@endsection
@section('index.con')
    @include('layouts.nav')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main class="flex-shrink-0">
        <div id="layoutSidenav_content">
                <div class="container-fluid px-4">
                    <h1 class="mt-4" id="customerz1">新增公告</h1>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <form id="form1" action="{{route('posts.store')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="success()">
                            @csrf
                            <p style="visibility: hidden;" id="user">{{auth()->user()->name}}</p>

                            <div class="form-group">
                                <label for="title" class="inline">標題：*</label>
                                <input id="title" name="title" class="form-control-itemname" placeholder="請輸入標題" value="{{ old('title') }}" required >
                            </div>

                            <div class="form-group">
                                <label for="tag" class="inline">標籤：*</label>
                                <select name="tag" style="width: 200px;" class="form-control-itemname">
                                    <option value="音樂會公告" selected>音樂會公告</option>
                                    <option value="活動宣傳" >活動宣傳</option>
                                    <option value="招生宣傳" >招生宣傳</option>
                                    <option value="團練公告" >團練公告</option>
                                    <option value="行政公告" >行政公告</option>
                                    <option value="社團榮耀" >社團榮耀</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="content" class="inline">內容：*</label>
                                <textarea id="content" name="content" class="form-control" rows="10" style="white-space: pre;" required>{{ old('content') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="link" class="inline">附件</label>
                                <input type="file" name="link" accept="image/*">
                            </div>

                            <div class="text-right">
                                <button id="ch" type="button" class="btn btn-primary">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </main>
    @include('layouts.footer')
@endsection
