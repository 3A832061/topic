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
                    <h1 class="mt-4" id="customerz1">新生表單</h1>
                </div>
                <!-- /.row -->
                <p>
                <div class="row">
                    <div class="col-lg-8">
                        <iframe name="hidden_iframe" style="display: none;"></iframe>
                        <form action="https://script.google.com/macros/s/AKfycbwda7078NqX02Ov-gQCVC129m8znjJ7PQCHQIdrub806O8t9RFqReXTXSOLGSDfJd2wdw/exec" target="hidden_iframe" method="POST" role="form" >
                            @csrf
                            <input type="hidden" name="method" value="write" >
                            <div class="form-group">
                                <label for="name" class="inline">姓名：*</label>
                                <input name="name" class="form-control-itemname" required placeholder="請輸入名字" value="">
                            </div>

                            <div class="form-group">
                                <label for="phone" class="inline">手機：*</label>
                                <input name="phone" class="form-control-itemname" required placeholder="請輸入手機" value="">
                            </div>

                            <div class="form-group">
                                <label for="email" class="inline">email：*</label>
                                <input name="email" class="form-control-itemname" required placeholder="請輸入電子信箱" value="">
                            </div>

                            <div class="form-group">
                                <label for="study" class="inline">是否為勤益在校生*</label>
                                <select id="study" name="study" class="form-control" required onchange="study_visbility()">
                                    <option value="是" selected>是</option>
                                    <option value="否">否</option>
                                </select>
                            </div>

                            <div id="student">
                                <div class="form-group">
                                    <label for="clas" class="inline">班級：*</label>
                                    <input name="clas" class="form-control-itemname" placeholder="請輸入班級" value="">
                                </div>

                                <div class="form-group">
                                    <label for="acc" class="inline">學號：</label>
                                    <input name="acc" class="form-control-itemname" placeholder="請輸入學號" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="play" class="inline">是否學過樂器*</label>
                                <select id="play" name="play" class="form-control" required onchange="play_visbility()">
                                    <option value="是" selected>是</option>
                                    <option value="否" >否</option>
                                </select>
                            </div>

                            <div id="player">
                                <div class="form-group">
                                    <label for="music" class="inline">學過哪些的樂器：</label>
                                    <input name="music" class="form-control-itemname" value="">
                                </div>

                                <div class="form-group">
                                    <label for="year" class="inline">學過多久：</label>
                                    <input name="year" class="form-control-itemname" value="">
                                </div>

                                <div class="form-group">
                                    <label for="teacher" class="inline">曾接觸過的指揮老師或分部老師?：</label>
                                    <input name="teacher" class="form-control-itemname" placeholder="寫出老師的名字" value="">
                                </div>

                                <div class="form-group">
                                    <label for="havein" class="inline">是否擁有自己的樂器：</label>
                                    <input name="havein" class="form-control-itemname" placeholder="若有請填寫品牌、型號，沒有就填無" value="">
                                </div>

                                <div class="form-group">
                                    <label for="havemo" class="inline">是否擁有自己的吹嘴：</label>
                                    <input name="havemo" class="form-control-itemname" placeholder="若有請填寫品牌、型號，沒有就填無" value="">
                                </div>

                                <div class="form-group">
                                    <label for="song" class="inline" >曾經演奏過最有印象的三首曲子：</label>
                                    <textarea name="song" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="want" class="inline">我想學的樂器是：*</label>
                                <input name="want" class="form-control-itemname" required placeholder="" value="">
                            </div>

                            <div class="form-group">
                                <label for="mark" class="inline">我會看的樂譜記號：*</label>
                                <input name="mark" class="form-control-itemname" required placeholder="高音譜記號、低音譜記號，或都不會" value="" >
                            </div>

                            <div class="form-group">
                                <label for="remark" class="inline">備註：</label>
                                <input name="remark" class="form-control-itemname" placeholder="" value="">
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" onclick="success()">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </main>
    @include('layouts.footer')
    <script>
        function study_visbility(){
            var study = document.getElementById("study");
            var index=study.selectedIndex;
            var student = document.getElementById("student");
            if(study.options[index].value==="是"){
                student.style.display="block";
            }
            else{
                student.style.display="none";
            }
        }

        function play_visbility(){
            var play = document.getElementById("play");
            var index=play.selectedIndex;
            var player = document.getElementById("player");
            if(play.options[index].value==="是"){
                player.style.display="block";
            }
            else{
                player.style.display="none";
            }
        }

        function touch(){
            if(document.getElementById('mark3').checked){
                document.getElementById('mark1').checked=false;
                document.getElementById('mark2').checked=false;
            }
            else if(document.getElementById('mark2').checked){
                document.getElementById('mark3').checked=false;
            }
            else if(document.getElementById('mark1').checked){
                document.getElementById('mark3').checked=false;
            }
        }

        function success(){
            window.alert("提交成功，感謝填寫，之後會有幹部再跟你聯絡");
            document.getElementById('index').click();
        }
    </script>
@endsection
