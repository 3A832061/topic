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
    <script>
        function inputClass(){

            if(document.getElementsByName("class")[0].value=="非在校"){
                document.getElementById("accDiv").style.display="none";
            }
            else {
                document.getElementById("accDiv").style.display="block";
            }
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
    <main class="flex-shrink-0">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" id="customerz1">{{auth()->user()->name}} 社員資料</h1>
                </div>
                <!-- /.row -->
                <p>
                <div class="row">
                    <div class="col-lg-8">
                        <form action={{ route('user.update',auth()->user()->id) }} method="POST" role="form">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name" class="inline">名字：</label>
                                <input readonly name="name" class="form-control-itemname" placeholder="請輸入名字" value="{{auth()->user()->name}}">
                            </div>

                            <div class="form-group">
                                <label for="class" class="inline" >班級：</label>
                                <input name="class" class="form-control-itemname" placeholder="請輸入班級，若非在校生，請填非在校" value="{{auth()->user()->class}}" onchange="inputClass()">
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
                                <label for="part" class="inline">聲部：</label>
                                <select name="part" class="form-control-itemname">
                                    <option value="長笛"      {{ (auth()->user()->part=="長笛")?'selected':'' }}>長笛 Fl</option>
                                    <option value="豎笛"      {{ (auth()->user()->part=="豎笛")?'selected':'' }}>豎笛 Cl</option>
                                    <option value="薩克"      {{ (auth()->user()->part=="薩克")?'selected':'' }}>薩克斯風 Sax</option>
                                    <option value="法國號"    {{ (auth()->user()->part=="法國號")?'selected':'' }}>法國號 Horn</option>
                                    <option value="長號"      {{ (auth()->user()->part=="長號")?'selected':'' }}>長號 Tb</option>
                                    <option value="小號"      {{ (auth()->user()->part=="小號")?'selected':'' }}>小號 Tp</option>
                                    <option value="上低音號"   {{ (auth()->user()->part=="上低音號")?'selected':'' }}>上低音號 Eup</option>
                                    <option value="低音號"    {{ (auth()->user()->part=="低音號")?'selected':'' }}>低音號 Tuba</option>
                                    <option value="打擊"      {{ (auth()->user()->part=="打擊")?'selected':'' }}>打擊 Per</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="year" class="inline">入社年：{{auth()->user()->year}}</label>
                            </div>

                            <div class="form-group">
                                <label class="inline">職位： {{auth()->user()->pos}}</label>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="inline">手機：</label>
                                <input name="phone" class="form-control-itemname" placeholder="" value={{auth()->user()->phone}}>
                            </div>

                            <div class="form-group">
                                <label for="pay" class="inline">社費繳交：</label>
                                <input name="pay" type="checkbox"  {{ (auth()->user()->pay==1 )?'checked':'' }}  onclick="return false;"
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
