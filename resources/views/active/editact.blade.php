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
    <!-- 公告-->

    <h1 style="padding-top: 5%;text-align: center;">修改活動照片</h1>
    <main class="content">
                        <form action="{{route('active.update',$actives->id)}}" method="POST" role="form" enctype="multipart/form-data"  onsubmit="success()">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="type" class="inline">紀錄類型：</label>
                                <select name="type" class="form-control-itemname">
                                    <option value="音樂會" selected>音樂會</option>
                                    <option value="迎新">迎新</option>
                                    <option value="社慶">社慶</option>
                                    <option value="講座">講座</option>
                                    <option value="寒/暑訓">寒/暑訓</option>
                                    <option value="幹部訓練">幹部訓練</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="content" class="inline" >註記內容：</label>
                                <input id="content" name="content" class="form-control-itemname" required value="{{old('content',$actives->content)}}" >
                            </div>

                            <div class="form-group">
                                <label for="url" class="inline">照片：</label>
                                <input type="file" name="picture" required accept="image/*" >
                                <input type="checkbox"  name="link_del" value="true"><label>刪除附件</label>
                            </div>

                            <div class="text-right">
                                <button style="float: right;" type="submit" class="btn btn-primary">儲存</button>
                            </div>
                        </form>
        <h3>目前附件：</h3>
        <figure class='mb-4'>
            @if($actives->url!=null)
                <img style="max-width: 30%;" class='img-fluid rounded' src={{asset("images/actives/".$actives->url)}} alt='...' />
            @else
                <p style="padding-left: 80px;">無附件</p>
            @endif
        </figure>
    </main>
    @include('layouts.footer')
    <script>
        function success(){
            alert('修改成功');
        }
    </script>
@endsection
