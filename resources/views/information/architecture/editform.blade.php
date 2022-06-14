@extends('layouts.partials.type')
@section('form.css')
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">

    <style>
        .row
        {padding-left:5% !important;}
        .mt-4
        {padding-left: 5%;}
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
    <script>
        function success(){
            window.alert("提交成功，感謝填寫");
        }
    </script>
@endsection
@section('index.con')
    @include('layouts.nav')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- 公告-->

                    <h1 style="margin-top: 5%;text-align: center;">修改職位資料</h1>

                <div class="content">

                        <form id="form1" action="{{route('architectures.update',$architecture->id)}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="success();">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="inline">職位名稱：</label>
                                <input name="title" class="form-control-itemname" placeholder="請輸入職位" value="{{ old('title',$architecture->title) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="content" class="inline" style="vertical-align: top;">權責：</label>
                                <textarea id="content" name="content" class="form-control-itemname" required style=" white-space: pre;height: 150px;" >{{ old('content',$architecture->content) }}</textarea>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" style="float: right;">提交</button>
                            </div>
                        </form>
                    </div>

    @include('layouts.footer')
@endsection
