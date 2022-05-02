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
                    <h1 class="mt-4" id="customerz1">新增公告</h1>
                </div>
                <!-- /.row -->
                <p>
                <div class="row">
                    <div class="col-lg-8">
                        <form action="" method="POST" role="form">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="inline">曲目名稱：</label>
                                <input name="name" class="form-control-itemname" placeholder="請輸入名稱" value="">
                            </div>

                            <div class="form-group">
                                <label for="name" class="inline">曲目名稱：</label>
                                <input name="name" class="form-control-itemname" placeholder="請輸入名稱" value="">
                            </div>

                            <div class="form-group">
                                <label for="frag" class="inline">聲部：</label>
                                <select name="part" class="form-control">
                                    <option value="長笛" selected>長笛</option>
                                    <option value="豎笛" >豎笛</option>
                                    <option value="薩克" >薩克</option>
                                    <option value="法國號" >法國號</option>
                                    <option value="長號" >長號</option>
                                    <option value="小號" >小號</option>
                                    <option value="(上)低音號" >(上)低音號</option>
                                    <option value="打擊" >打擊</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="page" class="inline">部數：</label>
                                <input name="page" type="number" class="form-control-itemname" placeholder="請輸入部數（例：Alto Part2）" value="">
                            </div>

                            <div class="form-group">
                                <label for="quan" class="inline">份數：</label>
                                <input name="quan" type="number" class="form-control-itemname" placeholder="份數" value="">
                            </div>

                            <div class="form-group">
                                <label for="remark" class="inline">備註：</label>
                                <input name="remark" class="form-control-itemname" placeholder="" value="">
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
