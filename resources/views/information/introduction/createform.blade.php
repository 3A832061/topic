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
        .textarea{
            width: 70%;
            padding: 6px 12px;
            font-size: 14px;
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
            #content{
                width: 100%;
            }
        }
    </style>
@endsection
@section('index.con')
    @include('layouts.nav')

                    <h1 style="text-align: center;margin-bottom: 30px;margin-top: 5%;">新增簡介</h1>
    <div class="content">
                        <form action="{{route('introduction.store')}}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="inline">標題：</label>
                                <input name="title" class="form-control-itemname"  placeholder="請輸入標題" required value="諾曼本管樂社">
                            </div>

                            <div class="form-group">
                                <label for="content" class="inline" style="vertical-align: top;">內容：</label>
                                <textarea id="content" name="content" class="textarea"  rows="10" required style="overflow: auto;overflow-y: auto; white-space: pre;"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="picture" class="inline">附件</label>
                                <input type="file" name="picture" accept="image/*" required>
                            </div>

                            <div class="text-right">
                                <button style="float: right;" type="submit" class="btn btn-primary" >提交</button>
                            </div>
                        </form>
    </div>
    @include('layouts.footer')
@endsection
