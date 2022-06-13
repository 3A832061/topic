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
            pre
            {
                white-space: nowrap;
                word-wrap: break-word;
                font-size: 15px !important;
            }
        </style>
    </script>
@endsection
@section('index.con')
    @include('layouts.nav')
    <!-- 獎項-->
    <main class="flex-shrink-0">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" id="customerz1">新增指導老師</h1>
                </div>
                <!-- /.row -->
                <p>
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{route('teacher.store')}}" method="POST" role="form" id="form1">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="inline">指導老師名稱：</label>
                                <input name="title" class="form-control-itemname" placeholder="" value="">
                            </div>
                            <div class="form-group" >
                                <pre>
                                <label for="content" class="inline">老師介紹：</label>
                                    <textarea name="content" class="form-control-itemname" placeholder=""
                                           value=""></textarea>
                                </pre>
                            </div>
                            <div class="form-group">
                                <label for="url" class="inline">圖片網址：</label>
                                <input id="url" name="url" class="form-control" rows="2" placeholder="請輸入連結網址">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">儲存</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </main>
    @include('layouts.footer')
@endsection
