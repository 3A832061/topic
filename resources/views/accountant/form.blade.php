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
                    <h1 class="mt-4" id="customerz1">填寫收支</h1>
                </div>
                <!-- /.row -->
                <p>
                <div class="row">
                    <div class="col-lg-8">
                        <iframe name="hidden_iframe" style="display: none;"></iframe>
                        <form action="https://script.google.com/macros/s/AKfycbxyjFuW9b8KcsiFsFpZe26Cg1JmCxWmezEKFUZ_z2mK6fH3mOS5Kmuqvj0p5UlEAjBR/exec" target="hidden_iframe" method="POST" role="form" >
                            @csrf
                            <input type="hidden" name="method" value="write" >
                            <div class="form-group">
                                <label for="type" class="inline">收入/支出：</label>
                                <select id="type" name="type" class="form-control">
                                    <option value="收入" selected>收入</option>
                                    <option value="支出">支出</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="content" class="inline">來源/用途：</label>
                                <input name="content" class="form-control-itemname" required>
                            </div>

                            <div class="form-group">
                                <label for="price" class="inline">單價：</label>
                                <input name="price" type="number" class="form-control-itemname" required>
                            </div>

                            <div class="form-group">
                                <label for="quantity" class="inline">數量：</label>
                                <input name="quantity" type="number" class="form-control-itemname" required>
                            </div>

                            <div class="form-group">
                                <label for="remark" class="inline">備註：</label>
                                <input name="remark" class="form-control-itemname" placeholder="" value="">
                            </div>

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
            window.alert("提交成功");
            document.getElementById('accountantcreate').click();
        }
    </script>
@endsection
