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

                    <h1 style="text-align: center;margin-top: 5%;">樂譜缺頁申請單
                        <a class="btn btn-success " href={{route('sheetrequest.show')}}>查看審核狀態</a>
                    </h1>
    <br>
                    <div class="content">
                        <form action="{{route('sheetrequest.store')}}" target="hidden_iframe" method="POST" role="form" onsubmit="success()">
                            @csrf
                            <div class="form-group">
                                <label for="mem_name" class="inline">申請人姓名：*</label>
                                <input id="mem_name" name="mem_name" class="form-control-itemname" placeholder="請輸入姓名" required value="{{auth()->user()->name}}" >
                            </div>
                            <div class="form-group">
                                <label for="name" class="inline">申請曲目：*</label>
                                <input id="name" name="name" class="form-control-itemname" placeholder="請輸入曲目名稱" required value="" >
                            </div>
                            <div class="form-group">
                                <label for="part" class="inline">申請聲部：*</label>
                                <input id="part" name="part" class="form-control-itemname" placeholder="請輸入聲部名稱(如：長笛、豎笛、薩克斯風等）" required value="" >
                            </div>
                            <div class="form-group">
                                <label for="page" class="inline">申請的分部：*</label>
                                <input name="page" class="form-control-itemname" placeholder="請輸入分部(如：Part1,Part2-3）" required value="" id="page">
                            </div>
                            <div class="form-group">
                                <label for="num_page" class="inline">申請頁數：*</label>
                                <input name="num_page" type="number" class="form-control-itemname" placeholder="" value="" required id="numpage">
                            </div>
                            <div class="form-group">
                                <label for="quan" class="inline">份數：*</label>
                                <input name="quan" type="number" class="form-control-itemname" placeholder="請輸入申請份數" required value="1" id="quan">
                            </div>
                            <div class="form-group">
                                <label for="remark" class="inline">備註：</label>
                                <input name="remark" class="form-control-itemname" placeholder="如果有其他事項請在此處填寫" value="" id="remark">
                            </div>
                            <div class="form-group" style="display:none;">
                                <label for="state" class="inline"></label>
                                <input name="state" class="form-control-itemname" placeholder="" value="1" id="remark">
                            </div>

                            <div class="text-right">
                                <button style="float: right;" type="submit" class="btn btn-primary" >提交</button>
                            </div>
                        </form>
                    </div>

    @include('layouts.footer')
    <script>
        function success(){
            window.alert("已送出申請");
        }
    </script>
@endsection
