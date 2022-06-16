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
        dialog{
            border: none;
            box-shadow: 0 2px 6px #ccc;
            border-radius: 10px;
        }
        dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.1);
        }
        .inline.btn.btn-outline-primary.flex-lg-shrink-1:hover
        {
            color:blue;
            text-decoration:underline;
            border:0px;
            background-color:transparent;
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

                    <h1 style="margin-top: 5%;text-align: center;">修改樂譜資料</h1>
    <br>

                    <div class="content">
                        <form action="{{route('sheet.update',$sheet->id)}}" method="POST" role="form" onsubmit="success()">
                            @csrf
                            <h6 style="font-weight: bolder; color:red;">*=必填</h6><div class='form-group'>
                                <label for='name' class='inline'>曲目名稱：*</label>
                                <input id='name' name='name'  class='form-control-itemname' placeholder='請輸入曲目原文名稱' value='{{old('name',$sheet->name)}}' required>
                            </div>
                            <div class='form-group'>
                                <label for='type' class='inline'>曲目類型：</label>
                                <select id='type' name='type' class='form-control-itemname'>
                                    <option value='外文譜' {{ ($sheet->type=="外文譜")?'selected':'' }} >外文譜</option>
                                    <option value='日文譜' {{ ($sheet->type=="日文譜")?'selected':'' }}>日文譜</option>
                                    <option value="中文譜" {{ ($sheet->type=="中文譜")?'selected':'' }}>中文譜</option>
                                    <option value="重奏譜" {{ ($sheet->type=="重奏譜")?'selected':'' }}>重奏譜</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="zhname" class="inline">中文譯名：</label>
                                <input id="zhname" name="zhname" class="form-control-itemname" placeholder="若為外文曲目可輸入中譯名稱" value="{{old('zhname',$sheet->zhname)}}" >
                            </div>
                            <div class="form-group">
                                <label for="composer" class="inline">作曲者*：</label>
                                <input name="composer" class="form-control-itemname" placeholder="請輸入作曲者姓名" value="{{old('composer',$sheet->composer)}}" id="page" required>
                            </div>
                            <div class="form-group">
                                <label for="arranger" class="inline">編曲者：</label>
                                <input name="arranger" class="form-control-itemname" placeholder="請輸入編曲者姓名" value="{{old('arranger',$sheet->arranger)}}" id="numpage">
                            </div>
                            <div class="form-group">
                                <label for="lost" class="inline">存譜缺少聲部：</label>
                                <textarea name="lost" class="form-control-itemname" placeholder="若存譜有聲部缺少請在此處詳細註明" value="{{old('lost',$sheet->lost)}}" id="quan"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="saveform" class="inline">存放形式：</label>
                                <select id="saveform" name="saveform" class="form-control-itemname">
                                    <option value="電子譜" {{ ($sheet->saveform=="電子譜")?'selected':'' }}>純電子譜</option>
                                    <option value="紙本譜" {{ ($sheet->saveform=="紙本譜")?'selected':'' }}>純紙本譜</option>
                                    <option value="電子譜/紙本譜" {{ ($sheet->saveform=="電子譜/紙本譜")?'selected':'' }}>電子譜+紙本譜</option>
                                </select>
                            </div>
                            <!--譜的授權方式補充-->
                            <div class="form-group">
                                <label for="authorize" class="inline">授權模式：</label>
                                <select id="authorize" name="authorize" class="form-control-itemname">
                                    <option value="租賃譜" {{ ($sheet->authorize=="租賃譜")?'selected':'' }}>租賃譜</option>
                                    <option value="授權書模式" {{ ($sheet->authorize=="授權書模式")?'selected':'' }}>授權書模式</option>
                                    <option value="授權指揮模式" {{ ($sheet->authorize=="授權指揮模式")?'selected':'' }}}>授權指揮模式</option>
                                    <option value="原版譜模式" {{ ($sheet->authorize=="原版譜模式")?'selected':'' }}>原版譜模式</option>
                                    <option value="福利譜" {{ ($sheet->authorize=="福利譜")?'selected':'' }}>福利譜</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="year" class="inline">年份：</label>
                                <input name="year" class="form-control-itemname" type='year' placeholder="如果有其他事項請在此處填寫" value="{{$sheet->year}}" id="remark">
                            </div>
                            <div class="form-group">
                                <label for="price" class="inline">購譜價格：</label>
                                <input name="price" class="form-control-itemname" placeholder="如果有其他事項請在此處填寫" value="{{$sheet->price}}" id="remark">
                            </div>
                            <div class="form-group">
                                <label for="change1" class="inline">能否換譜：</label>
                                <select id="change1" name="change1" class="form-control-itemname">
                                    <option value="0" {{ ($sheet->change1=="0")?'selected':'' }}>可以換譜</option>
                                    <option value="1" {{ ($sheet->change1=="1")?'selected':'' }}>不可換譜</option>
                                </select>
                                <p style="margin-left: 5%;">※若不確定則默認不可換譜</p>
                            </div>
                            <div class="form-group">
                                <label for="check1" class="inline">10年間已演奏</label>
                                <select id="check1" name="check1" class="form-control-itemname">
                                    <option value="1" {{ ($sheet->check1=="1")?'selected':'' }}>是</option>
                                    <option value="0" {{ ($sheet->check1=="0")?'selected':'' }}>否</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="remark" class="inline">備註：</label>
                                <input name="remark" class="form-control-itemname" placeholder="如果有其他備註或重奏聲部類別請在此處填寫" value="{{old('remark',$sheet->remark)}}" id="remark">
                            </div>
                            <div class="form-group">
                                <label for="pin" class="inline"></label>
                                <input name="pin" class="form-control-itemname" placeholder="" value="{{old('pin',$sheet->pin)}}" id="pin"
                                       style="display:none;">
                            </div>
                            <div class="text-right">
                                <button style="float: right;" type="submit" class="btn btn-primary" >儲存</button>
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
            window.alert("成功修改!");
        }

    </script>
@endsection
