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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#ch").on('click',function(){
                $("#form1").submit();

                var user=$('#user').text(),title=$('#title').val();
                $.ajax({
                    type: "post",
                    data: {
                        "msg":title,
                        "user":user
                    },
                    url: "https://script.google.com/macros/s/AKfycbxwjZzQTPGn8Tl8tqVeLktolYG3Nz0nhBV5EK4bA4gxH9vUrX3qBXDesz6GZ4LHtJVNPA/exec",
                });
            });
        });
    </script>
<script>
    function success(){
        alert('????????????');
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
    <p style="visibility: hidden;" id="user">{{auth()->user()->name}}</p>
    <h1 style="text-align: center;margin-bottom: 30px;">????????????</h1>
        <div class="content">
                    <form id="form1" action="{{route('posts.store')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="success()">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="inline">?????????*</label>
                            <input id="title" name="title" class="form-control-itemname" placeholder="???????????????" value="{{ old('title') }}" required >
                        </div>

                        <div class="form-group">
                            <label for="tag" class="inline">?????????*</label>
                            <select name="tag"  class="form-control-itemname">
                                <option value="???????????????" selected>???????????????</option>
                                <option value="????????????" >????????????</option>
                                <option value="????????????" >????????????</option>
                                <option value="????????????" >????????????</option>
                                <option value="????????????" >????????????</option>
                                <option value="????????????" >????????????</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="content" class="inline" style="vertical-align: top;">?????????*</label>
                            <textarea id="content" name="content" class="form-control-itemname" rows="10" style="height: 150px; white-space: pre;" required>{{ old('content') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="link" class="inline">??????</label>
                            <input type="file" name="link" accept="image/*">
                        </div>

                        <div class="text-right">
                            <button style="float: right;" id="ch" type="button" class="btn btn-primary">??????</button>
                        </div>
                    </form>
        </div>

    @include('layouts.footer')
@endsection
