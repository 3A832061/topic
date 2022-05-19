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
            width: 55%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;

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
    <script >
    function touch(){
        window.alert("提交成功，感謝填寫");
        var data=document.getElementsByName("q");
        var alldata="";
        for(var i=0; i<data.length; i++){
            alldata+=data[i].value+"-";
        }
        document.getElementsByName("question").value=alldata;
        alert( document.getElementsByName("question").value );
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var date = new Date().getFullYear();
            if( (new Date().getMonth()+2).toString().length==1){
                date += '/0'+(new Date().getMonth()+2);
            }
            else{
                date += '/'+(new Date().getMonth()+2);
            }
            var user = "{{ (auth()->user()->name) }}";

            $.ajax({
                type: "post",
                data: {
                    "method": "read_calendar",
                    "query":'q',
                    "month":date
                },
                url: "https://script.google.com/macros/s/AKfycbzptHVuruemVEw0ARXgMaUb_EDXLfNCtYFSTc18f_QylMeg8W4Cox8_-5RLs8LtR-Ss/exec", // 填入網路應用程式網址
                success: function (e) {
                    if(e=="暫無資料"){

                    }
                    else{
                        var char=e.split('-');
                        $('#customerz1').html(char[0].substring(5)+"月出席");

                        $("#attend form").append("<input type='hidden' name='month' value='" +char[0]+ "'>");
                        char[0]='';
                        $.each(char, function(index2) {
                            if(char[index2]!=""){
                                $("#attend form").append("<div class='form-group'>" +
                                    "<label for='q' class='inline'>"+char[index2]+"</label>"+
                               "<select name='q' class='form-control' style='width: 80px;'> "+
                                "<option value='到' selected>到</option>"+
                               "<option value='不到' >不到</option>"+
                                "<option value='早退' >早退</option>"+
                                "<option value='遲到' >遲到</option></select></div>");
                            }
                        });
                        $("#attend form").append("<div class='text-right'><button type='submit' class='btn btn-primary'>提交</button></div>");
                    }
                },
                error:function(xhr){
                    alert("發生錯誤:1 " + xhr.status + " " + xhr.statusText);
                }
            });

        });
    </script>
@endsection
@section('index.con')
    @include('layouts.nav')
    <!-- 公告-->
    <main class="flex-shrink-0">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" id="customerz1">出席</h1>
                </div>
                <!-- /.row -->
                <p>
                <div class="row">
                    <div id="attend" class="col-lg-8">
                        <iframe name="hidden_iframe" style="display: none;"></iframe>
                        <form  action="https://script.google.com/macros/s/AKfycbzptHVuruemVEw0ARXgMaUb_EDXLfNCtYFSTc18f_QylMeg8W4Cox8_-5RLs8LtR-Ss/exec" method="POST" role="form" target="hidden_iframe" onsubmit="return touch();">
                            @csrf
                            <input type="hidden" name="method" value="write_attend" >
                            <input type="hidden" name="name" value="{{auth()->user()->name}}">
                            <input type="hidden" name="part" value="{{auth()->user()->part}}">
                            <input type="hidden" name="question" value="">
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </main>
    @include('layouts.footer')
@endsection
