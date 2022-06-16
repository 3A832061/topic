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
        pre {
            white-space: nowrap;
            word-wrap: break-word;
            font-size: 15px !important;
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
            alert('成功修改');
        }
    </script>
@endsection
@section('index.con')
    @include('layouts.nav')
    <!-- 獎項-->

                    <h1 style="margin-top: 5%;text-align: center;">修改獎項</h1>

                    <div class="content">
                        <form action="{{route('award.update',$awards->id)}}" method="POST" role="form" onsubmit="success()">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="year" class="inline">年份：*</label>
                                <input name="year" class="form-control-itemname" required value="{{old('year',$awards->year)}}">
                            </div>
                            <div class="form-group" >
                                <pre>
                                <label for="content" class="inline">獎項內容：*</label>
                                    <input name="content" class="form-control-itemname" required value="{{old('content',$awards->content)}}">
                                </pre>
                            </div>
                            <div class="text-right">
                                <button style="float: right;" type="submit" class="btn btn-primary">登錄</button>
                            </div>
                        </form>
                    </div>
    @include('layouts.footer')
@endsection
