@extends('layouts.partials.type')
@section('form.css')
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">

    <style>
        .row
        {padding-left:0 !important;}
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
            margin-left:30% !important;
            margin-right: 30%;
            margin-bottom:100px !important;
        }

        @media screen and (max-width: 800px) {
            #layoutSidenav_content
            {
                margin-left:10% !important;
                margin-right: 10%;
                margin-bottom:100px !important;
            }
        }
    </style>

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
    <main >
        <div id="layoutSidenav_content">
                <div class="container-fluid px-4">
                    <h1 class="mt-4" id="customerz1" >修改公告</h1>
                </div>
                <!-- /.row -->
                <p>
                <form action="{{route('posts.update',$post->id)}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="inline">標題：*</label>
                        <input name="title" class="form-control-itemname" placeholder="請輸入標題" value="{{old('title',$post->title)}}">
                    </div>

                    <div class="form-group">
                        <label for="tag" class="inline">標籤：*</label>
                        <select name="tag" style="width: 200px;" class="form-control-itemname">
                            <option value="音樂會公告" {{ ($post->tag=="音樂會公告")?'selected':'' }}>音樂會公告</option>
                            <option value="活動宣傳" {{ ($post->tag=="活動宣傳")?'selected':'' }}>活動宣傳</option>
                            <option value="招生宣傳" {{ ($post->tag=="招生宣傳")?'selected':'' }}>招生宣傳</option>
                            <option value="團練公告" {{ ($post ->tag=="團練公告")?'selected':'' }}>團練公告</option>
                            <option value="行政公告" {{ ($post ->tag=="行政公告")?'selected':'' }}>行政公告</option>
                            <option value="社團榮耀" {{ ($post ->tag=="社團榮耀")?'selected':'' }}>社團榮耀</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="content" class="inline">內容：*</label>
                        <textarea id="content" name="content" class="form-control" style=" white-space: pre;" rows="5">{{old('content',$post->content)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="link" class="inline">更新附件</label>
                        <input type="file" name="link">
                        <input type="checkbox"  name="link_del" value="true"><label>刪除附件</label>
                    </div>

                    <div   style="text-align:right;">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </form>

                <h3>目前附件：</h3>
                <figure class='mb-4'>
                    @if($post->link!=null)
                        <img style="max-width: 30%;" class='img-fluid rounded' src={{asset("images/posts/".$post->link)}} alt='...' />
                    @else
                        <p style="padding-left: 80px;">無附件</p>
                    @endif
                </figure>

        </div>
    </main>
    @include('layouts.footer')
@endsection
