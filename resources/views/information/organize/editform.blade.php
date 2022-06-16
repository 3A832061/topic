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

                    <h1 style="text-align: center;margin-top: 5%;">修改章程項目</h1>
<br>
                    <div class="content">
                        <form id="form1" action="{{route('organizes.update',$organize->id)}}" method="POST" role="form" onsubmit="return success();">
                            @csrf
                            <div class="form-group">
                                <label for="title" class="inline">標題：*</label>
                                <input name="title" class="form-control-itemname" placeholder="請輸入職位" value="{{ old('title',$organize->title) }}" required >
                            </div>

                            <div class="form-group">
                                <label for="content" class="inline" style="vertical-align: top;">項目：*</label>
                                <textarea id="content" name="content" class="form-control-itemname" required style="height: 150px; overflow: auto;overflow-y: auto; white-space: pre;">{{ old('content',$organize->content) }}</textarea>
                            </div>

                            <div class="text-right">
                                <button style="float: right;" type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </form>
                    </div>

    @include('layouts.footer')
@endsection
