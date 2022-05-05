@extends('layouts.partials.type')
@section('form.css')
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        .row {
            display: flex;
        }

        /* Create two equal columns that sits next to each other */
        .column {
            flex: 50%;
            padding: 10px;
        }

        .form{
            padding-left: 50%;
        }

        @media screen and (max-width: 1200px) {
            .column {
                width: 95%;
                flex: 100%;
            }
            .form{
                padding-left: 2%;
            }
        }

        .form-control-itemname
        {
            display: inline;
            width: 100%;
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
        layoutSidenav_content
        {
            margin-left:200px !important;
            margin-bottom:100px !important;
        }
    </style>
@endsection
@section('index.con')
    @include('layouts.nav')

    <div class="row">
        <div class="column" style="background-color:#aaa;">

                <center>
                <h1 class="mt-4" id="customerz1"style="align-content: center">日程設定</h1>
                </center>

            <!-- /.row -->
            <p>
            <div class="row">
                <div class="col-lg-8">
                    <div class="form">
                    <form action={{route('calendar.store')}} method="POST" role="form" >
                        @csrf
                        <div class="form-group">
                            <label for="date" class="inline">時間：</label>
                            <input name="date" class="form-control-itemname" placeholder="ex：5/5（四） 18:30~21:30" value="">
                        </div>

                        <div class="form-group">
                            <label for="title" class="inline">內容：</label>
                            <input name="title" class="form-control-itemname" placeholder="ex：團練、社課、迎新一籌...等" value="">
                        </div>

                        <div class="form-group">
                            <label for="tag" class="inline" >標籤：</label>
                            <select name="tag" class="form-control" style="width: 100%">
                                <option value="練習" selected>練習</option>
                                <option value="開會" >開會</option>
                                <option value="活動" >活動</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="month" class="inline">月份：</label>
                            <input name="month" type="form-control-itemname" class="form-control-itemname" value="{{date('Y/m')}}">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="column" style="background-color:#bbb;">
            <div class="container-fluid px-4">
                <center>
                    <h1 class="mt-4" id="customerz1">已設定的日程</h1>
                </center>
            </div>
            <p>Some text..</p>
        </div>
    </div>
    @include('layouts.footer')
@endsection
