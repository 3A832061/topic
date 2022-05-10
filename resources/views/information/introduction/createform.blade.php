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
@endsection
@section('index.con')
    @include('layouts.nav')
    <main class="flex-shrink-0">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" id="customerz1">新增簡介</h1>
                </div>
                <!-- /.row -->
                <p>
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{route('introduction.store')}}" method="POST" role="form">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="inline">標題：</label>
                                <input name="title" class="form-control-itemname" placeholder="請輸入標題" value="諾曼本管樂社">
                            </div>

                            <div class="form-group">
                                <label for="content" class="inline">內容：（換行要打\n）</label>
                                <textarea id="content" name="content" class="form-control" rows="10"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="picture" class="inline">圖片</label>
                                <input name="picture" class="form-control-itemname" placeholder="請輸入連結網址">
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </main>
    @include('layouts.footer')
@endsection
