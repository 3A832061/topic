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
                    <h1 class="mt-4" id="customerz1">樂譜缺頁申請單</h1>
                    <a class="btn btn-success flex-shrink-0" href={{route('apply.show')}}>查看審核狀態</a>
                </div>
                <!-- /.row -->
                <p>
                <div class="row">
                    <div class="col-lg-8">
                        <iframe name="hidden_iframe" style="display: none;"></iframe>
                        <form action="https://script.google.com/macros/s/AKfycbwxP0A74AXEsQjthb_np0Hpzv3mbTR6u7MrAQ58DvLPTw5Gf_G3UyJ3FrfVxaScBlw52Q/exec" target="hidden_iframe" method="POST" role="form" >
                            @csrf
                            <input type="hidden" name="method" value="write" >
                            <input type="hidden" name="method" value="write" >
                            <div class="form-group">
                                <label for="name" class="inline">申請人姓名：</label>
                                <input id="name" name="name" class="form-control-itemname" placeholder="請輸入姓名" value="" >
                            </div>
                            <div class="form-group">
                                <label for="sheet" class="inline">申請曲目：</label>
                                <input id="sheet" name="sheet" class="form-control-itemname" placeholder="請輸入曲目名稱" value="" >
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
                                <label for="numpage" class="inline">申請頁數：</label>
                                <input name="numpage" class="form-control-itemname" placeholder="請輸入頁數(如：P.5。若是多頁請用橫槓表示，如：P.6-17）" value="" id="numpage">
                            </div>
                            <div class="form-group">
                                <label for="quan" class="inline">份數：</label>
                                <input name="quan" type="number" class="form-control-itemname" placeholder="請輸入申請份數" value="1" id="quan">
                            </div>
                            <div class="form-group">
                                <label for="remark" class="inline">備註：</label>
                                <input name="remark" class="form-control-itemname" placeholder="如果有其他事項請在此處填寫" value="" id="remark">
                            </div>
                            <!--判斷權限-->
                            <div class="form-group">
                            <label for="state" class="inline">狀態</label>
                            <select id="state" name="play" class="form-control"  onchange="state()">
                                <option value="申請中" selected>申請中</option>
                                <option value="已發放" >已發放</option>
                                <option value="取消" >取消</option>
                            </select>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" onclick="success()">提交</button>
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
            document.getElementById('index').click();
        }
    </script>
@endsection
