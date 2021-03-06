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
    <script>
        function inputClass(){
            if(document.getElementsByName("class")[0].value=="非在校"){
                document.getElementById("accDiv").style.display="none";
            }
            else {
                document.getElementById("accDiv").style.display="block";
            }
        }
        function inputcheck(){
            document.getElementsByName("pay")[0].clicked==true;
        }

        function check(){
            alert("修改成功");
        }
    </script>
@endsection
@section('index.con')
    @include('layouts.nav')

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>

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

                    <h1 style="margin-top: 5%;text-align: center;">{{auth()->user()->name}} 的社員資料</h1>
<br>
                    <div class="content">
                        <form action={{ route('user.update',auth()->user()->id) }} method="POST" role="form" onsubmit="check()">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name" class="inline">名字：*</label>
                                <input  name="name" class="form-control-itemname" required placeholder="請輸入名字" value="{{auth()->user()->name}}">
                            </div>

                            <div class="form-group">
                                <label for="class" class="inline" >班級：*</label>
                                <input name="class" class="form-control-itemname" required placeholder="請輸入班級，若非在校生，請填非在校" value="{{auth()->user()->class}}" onchange="inputClass()">
                            </div>

                            @if(auth()->user()->class!='非在校')

                            <div class="form-group">
                                <div  id="accDiv">
                                    <label for="acc" class="inline">學號：</label>
                                    <input name="acc" class="form-control-itemname" placeholder="請輸入學號" value="{{auth()->user()->acc}}">
                                </div>
                            </div>

                            @endif

                            <div class="form-group">
                                <label for="part" class="inline">聲部：*</label>
                                <select name="part" class="form-control-itemname">
                                    <option value="Fl"      {{ (auth()->user()->part=="FL")?'selected':'' }}>長笛 Fl</option>
                                    <option value="Cl"      {{ (auth()->user()->part=="Cl")?'selected':'' }}>豎笛 Cl</option>
                                    <option value="Sax"      {{ (auth()->user()->part=="Sax")?'selected':'' }}>薩克斯風 Sax</option>
                                    <option value="Horn"    {{ (auth()->user()->part=="Horn")?'selected':'' }}>法國號 Horn</option>
                                    <option value="Tb"      {{ (auth()->user()->part=="Tb")?'selected':'' }}>長號 Tb</option>
                                    <option value="Tp"      {{ (auth()->user()->part=="Tp")?'selected':'' }}>小號 Tp</option>
                                    <option value="Eup"   {{ (auth()->user()->part=="Eup")?'selected':'' }}>上低音號 Eup</option>
                                    <option value="Tuba"    {{ (auth()->user()->part=="tuba")?'selected':'' }}>低音號 Tuba</option>
                                    <option value="Per"      {{ (auth()->user()->part=="Per")?'selected':'' }}>打擊 Per</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <?php
                                $year=date_format(auth()->user()->created_at,'Y/m/d');
                                ?>
                                <label for="year" class="inline">入社年：</label><label>{{$year}}</label>
                            </div>

                            <div class="form-group">
                                <label class="inline">職位：</label><label>{{auth()->user()->pos}}</label>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="inline">手機：*</label>
                                <input name="phone" class="form-control-itemname" placeholder="" required value={{auth()->user()->phone}}>
                            </div>

                            <div class="form-group">
                                <label for="pay" class="inline">社費繳交：</label>
                                <input name="pay" type="checkbox"  onclick="javascript: return false;" value={{auth()->user()->pay}} {{ (auth()->user()->pay==1 )?'checked':'' }}   >
                            </div>

                            <div class="text-right">
                                <button style="float: right;" type="submit" class="btn btn-primary" onsubmit="inputcheck();">提交</button>
                            </div>
                        </form>
                    </div>

    @include('layouts.footer')
@endsection
