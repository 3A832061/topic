@extends('layouts.partials.type')
@section('title','管樂社')
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
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

@endsection
@section('index.con')
    @include('layouts.nav')
    <!-- 公告-->

    @if (Route::has('login'))
        @auth
            <div class="container mt-3">
            <form action="" method="POST" role="form">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="method" value="read_data">
                    <label for="type">類別</label>
                    <select name="type" style="width: 200px;" class="form-control-itemname" onchange="select()">
                        <option value="器材" selected>器材</option>
                        <option value="耗材" >耗材</option>
                        <option value="樂器" >樂器</option>
                    </select>
                </div>
            </form>
            </div>
        @endauth
    @endif
    <div id="show">
        <div class="container mt-3">
            <h2>器材清單</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>名稱</th>
                    <th>數量</th>
                    <th>存放位置</th>
                    <th>目前狀態</th>
                    <th>備註</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    @include('layouts.footer')
@endsection
