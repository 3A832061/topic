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
            $("#ar").on('click',function(){
                $("#form1").submit();
                var user=$('#mem_name').val(),title=$('#name').val();
                $.ajax({
                    type: "post",
                    data: {
                        "msg":title,
                        "user":user
                    },
                    url: "https://script.google.com/macros/s/AKfycbx9d-dk6ZdtsGXfKPpzsMbPDSmjAvQFaspqGzG2BWuoeDTS5WhE-RADy_ruGLzK48q5dQ/exec",
                });
            });
        });
    </script>
@endsection
@section('index.con')
    @include('layouts.nav')
    <main class="flex-shrink-0">
        <div id="" style="padding-left:-10% !important;">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" id="customerz1">樂譜缺頁申請單</h1>
                    <a class="btn btn-success flex-shrink-0" href={{route('sheetrequest.show')}} id="form1">查看審核狀態</a>
                </div>
                <!-- /.row -->
                <p>
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{route('sheetrequest.store')}}"  method="POST" role="form" id="form1" >
                            @csrf
                            <div class="form-group">
                                <label for="mem_name" class="inline">申請人姓名：</label>
                                <input id="mem_name" name="mem_name" class="form-control-itemname" placeholder="請輸入姓名" value="{{auth()->user()->name}}" >
                            </div>
                            <div class="form-group">
                                <label for="name" class="inline">申請曲目：</label>
                                <input id="name" name="name" class="form-control-itemname" placeholder="請輸入曲目名稱" value="" >
                            </div>
                            <div class="form-group">
                                <label for="part" class="inline">申請聲部：</label>
                                <input id="part" name="part" class="form-control-itemname" placeholder="請輸入聲部名稱(如：長笛、豎笛、薩克斯風等）" value="" >
                            </div>
                            <div class="form-group">
                                <label for="page" class="inline">申請的分部：</label>
                                <input name="page" class="form-control-itemname" placeholder="請輸入分部(如：Part1,Part2-3）" value="" id="page">
                            </div>
                            <div class="form-group">
                                <label for="num_page" class="inline">申請頁數：</label>
                                <input name="num_page" type="number" class="form-control-itemname" placeholder="" value="" id="numpage">
                            </div>
                            <div class="form-group">
                                <label for="quan" class="inline">份數：</label>
                                <input name="quan" type="number" class="form-control-itemname" placeholder="請輸入申請份數" value="1" id="quan">
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
                                <button type="submit" class="btn btn-primary" onclick="success()" id="ar">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </main>
    @include('layouts.footer')
    <script>
        function success(){
            window.alert("已送出申請");
        }
    </script>
@endsection
