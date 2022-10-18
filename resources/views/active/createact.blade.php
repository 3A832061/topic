@extends('layouts.partials.type')
@section('title','諾曼本管樂社 - 活動紀錄')
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


                    <h1 style="padding-top: 5%;text-align: center;">新增活動照片</h1>
    <main class="content">
                        <form action="{{route('active.store')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="success()">
                            @csrf
                            <div class="form-group">
                                <select name="type" class="form-control-itemname" style="display: none;">
                                    <option value="音樂會" selected>音樂會</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content" class="inline" style="vertical-align: top;">註記內容：*</label>
                                <input id="content" name="content" class="form-control-itemname" required>
                            </div>

                            <div class="form-group">
                                <label for="url" class="inline">照片：*</label>
                                <input type="file" name="picture" required accept="image/*">
                            </div>

                            <div class="text-right">
                                <button style="float: right;" type="submit" class="btn btn-primary">儲存</button>
                            </div>
                        </form>

    </main>
    @include('layouts.footer')
    <script>
        function success(){
            alert('新增成功');
        }
    </script>
@endsection
