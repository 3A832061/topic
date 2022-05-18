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
                    <h1 class="mt-4" id="customerz1">社員資料</h1>
                </div>
                <!-- /.row -->
                <p>
                <div class="row">
                    <div class="col-lg-8">
                        <form action="" method="POST" role="form">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="inline">名字：</label>
                                <input readonly name="name" class="form-control-itemname" placeholder="請輸入名字" value="{{auth()->user()->name}}">
                            </div>

                            <div class="form-group">
                                <label for="acc" class="inline">班級：</label>
                                <input name="acc" class="form-control-itemname" placeholder="請輸入班級，若非在校生，請填非在校" value="{{auth()->user()->class}}">
                            </div>

                            @if(auth()->user()->class!='非在校')
                            <div class="form-group">
                                <label for="acc" class="inline">學號：</label>
                                <input name="acc" class="form-control-itemname" placeholder="請輸入學號" value="{{auth()->user()->acc}}">
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="frag" class="inline">聲部：</label>
                                @if(auth()->user()->part)!='')
                                <select name="part" class="form-control">
                                    <option value="長笛" {{ ($calendar->tag=="練習")?'selected':'' }}>長笛</option>
                                    <option value="豎笛" {{ ($calendar->tag=="練習")?'selected':'' }}>豎笛</option>
                                    <option value="薩克" {{ ($calendar->tag=="練習")?'selected':'' }}>薩克</option>
                                    <option value="法國號" {{ ($calendar->tag=="練習")?'selected':'' }}>法國號</option>
                                    <option value="長號" {{ ($calendar->tag=="練習")?'selected':'' }}>長號</option>
                                    <option value="小號" {{ ($calendar->tag=="練習")?'selected':'' }}>小號</option>
                                    <option value="上低音號" {{ ($calendar->tag=="練習")?'selected':'' }}>(上)低音號</option>
                                    <option value="低音號" {{ ($calendar->tag=="練習")?'selected':'' }}>(上)低音號</option>
                                    <option value="打擊" {{ ($calendar->tag=="練習")?'selected':'' }}>打擊</option>
                                </select>
                                @else
                                    <select name="part" class="form-control">
                                        <option selected="selected" disabled="disabled"  style='display: none' value=''></option>
                                        <option value="長笛">長笛</option>
                                        <option value="豎笛">豎笛</option>
                                        <option value="薩克">薩克</option>
                                        <option value="法國號">法國號</option>
                                        <option value="長號">長號</option>
                                        <option value="小號">小號</option>
                                        <option value="上低音號">上低音號</option>
                                        <option value="低音號">低音號</option>
                                        <option value="打擊">打擊</option>
                                    </select>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="quan" class="inline">入社年：</label>
                                <input name="quan" type="number" class="form-control-itemname" value="{{auth()->user()->year}}">
                            </div>

                            <div class="form-group">
                                <label for="page" class="inline">職位：</label>
                                <select name="part" class="form-control">
                                    <option value="社員">社員</option>
                                    <option value="社長">社長</option>
                                    <option value="副社">副社長</option>
                                    <option value="總務">總務</option>
                                    <option value="譜務">譜務</option>
                                    <option value="器材">器材</option>
                                    <option value="文書">文書</option>
                                    <option value="美宣">美宣</option>
                                    <option value="公關">公關</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="remark" class="inline">手機：</label>
                                <input name="remark" class="form-control-itemname" placeholder="" value="">
                            </div>

                            <div class="form-group">
                                <label for="remark" class="inline">信箱：</label>
                                <input name="remark" class="form-control-itemname" placeholder="" value="">
                            </div>

                            <div class="form-group">
                                <label for="remark" class="inline">備註：</label>
                                <input name="remark" class="form-control-itemname" placeholder="" value="">
                            </div>

                            <div class="form-group">
                                <label for="remark" class="inline">社費繳交：</label>
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
