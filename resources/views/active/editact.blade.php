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
    <!-- 公告-->
    <main class="flex-shrink-0">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" id="customerz1">新增紀錄</h1>
                </div>
                <!-- /.row -->
                <p>
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{route('active.update',$actives->id)}}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="type" class="inline">紀錄類型：</label>
                                <select name="type" class="form-control">
                                    <option value="音樂會" selected>音樂會</option>
                                    <option value="試樂器">試樂器</option>
                                    <option value="迎新">迎新</option>
                                    <option value="社慶">社慶</option>
                                    <option value="講座">講座</option>
                                    <option value="寒/暑訓">寒/暑訓</option>
                                    <option value="幹部訓練">幹部訓練</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content" class="inline" >註記內容：（換行要打\n）</label>
                                <input id="content" name="content" class="form-control" value="{{old('content',$actives->content)}}">
                            </div>

                            <div class="form-group">
                                <label for="url" class="inline">圖片網址：</label>
                                <input id="url" name="url" class="form-control" placeholder="請輸入連結網址" value="{{old('url',$actives->url)}}">

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
