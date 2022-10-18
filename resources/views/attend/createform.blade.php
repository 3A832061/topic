@extends('layouts.partials.type')
@section('title','諾曼本管樂社 - 出席管理')
@section('form.css')
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }
        .row
        {padding-left:50px !important;}
        .mt-4
        {padding-left: 35px;}
        /*--*/
        .form-control-itemname
        {
            width: 49%;
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
            width: 50%;

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
        .dropbtn {
            background-color: #3498DB;
            color: white;
            padding: 14px;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        /* Dropdown button on hover & focus */
        .dropbtn:hover, .dropbtn:focus {
            background-color: #2980B9;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #ddd}

        .item{
            width: 100%;
        }

        .item:hover, .item:focus, .item:active{
            background-color: #2980B9;
        }
        /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
        .show {display:block;}
        .content {
            margin:auto;
            width: 60%;
            background-color: #f2f2f2;
            padding: 20px;
        }

        @media screen and (max-width: 742px) {
            .form-control-itemname, .inline {
                text-align: left;
                width: 100%;
                margin-top: 0;
            }
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
        document.getElementsByName("question")[0].value=alldata;
        alert(document.getElementsByName("question")[0].value);
    }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        $(document).ready(function(){
            $('.dropbtn').on('click',function(){
                document.getElementById("myDropdown").classList.toggle("show");
            });
            $('.dropbtn').one('click',function(){
                $.ajax({
                    type: "post",
                    data: {
                        "method": "read_calendar",
                        "query": "month"
                    },
                    url: "https://script.google.com/macros/s/AKfycbwPIzTzCBQ0DlUAq7zBlCxKa3rZ7l-eoksCeHRAvICiz6fPiQOYihKv5_jcfuHv-uzX/exec", // 填入網路應用程式網址
                    success: function (e) {
                        data=e;
                        var char=e.split('-');
                        $.each(char, function(index, element) {
                            if(element!=''){
                                $(".dropdown-content").append("<button id='" + element + "' class='item'>" + element + "</button>");
                            }
                        });

                        $('.item').on('click',function(){
                            $.ajax({
                                type: "post",
                                data: {
                                    "method": "read_attend",
                                    "query":"q",
                                    "user":$("#name").val(),
                                    month:this.id,
                                },
                                url: "https://script.google.com/macros/s/AKfycbwPIzTzCBQ0DlUAq7zBlCxKa3rZ7l-eoksCeHRAvICiz6fPiQOYihKv5_jcfuHv-uzX/exec", // 填入網路應用程式網址
                                success: function (item_data) {
                                    $('#tmp').html('');
                                    var char=item_data.split('-');
                                    $('#customerz1').html(char[0].substring(5)+"月出席");
                                    $("#tmp").append("<input type='hidden' name='month' value='" +char[0]+ "'>");
                                    char[0]='';

                                    if(char[1]=="1"){
                                        char[1]="";
                                        $.each(char, function(index2) {
                                            if(char[index2]!=""){
                                                cut=char[index2].split(',');
                                                if(cut[1]=="到") {
                                                    $("#tmp").append("<div class='form-group'>" +
                                                        "<label for='q' class='inline'>" + cut[0] + "</label>" +
                                                        "<select name='q' class='form-control-itemname' style='width: 80px;display:inline;'>" +
                                                        "<option value='到' selected>到</option>" +
                                                        "<option value='不到' >不到</option>" +
                                                        "<option value='早退' >早退</option>" +
                                                        "<option value='晚到' >晚到</option></select></div>");
                                                }
                                                else if(cut[1]=="不到"){
                                                    $("#tmp").append("<div class='form-group'>" +
                                                        "<label for='q' class='inline'>" + cut[0] + "</label>" +
                                                        "<select name='q' class='form-control-itemname' style='width: 80px;display:inline;'>" +
                                                        "<option value='到' >到</option>" +
                                                        "<option value='不到' selected>不到</option>" +
                                                        "<option value='早退' >早退</option>" +
                                                        "<option value='晚到' >晚到</option></select></div>");
                                                }
                                                else if(cut[1]=="早退"){
                                                    $("#tmp").append("<div class='form-group'>" +
                                                        "<label for='q' class='inline'>" + cut[0] + "</label>" +
                                                        "<select name='q' class='form-control-itemname' style='width: 80px;display:inline;'>" +
                                                        "<option value='到' >到</option>" +
                                                        "<option value='不到' >不到</option>" +
                                                        "<option value='早退' selected>早退</option>" +
                                                        "<option value='晚到' >晚到</option></select></div>");
                                                }
                                                else if(cut[1]=="遲到"){
                                                    $("#tmp").append("<div class='form-group'>" +
                                                        "<label for='q' class='inline'>" + cut[0] + "</label>" +
                                                        "<select name='q' class='form-control-itemname' style='width: 80px;display:inline;'>" +
                                                        "<option value='到' >到</option>" +
                                                        "<option value='不到' >不到</option>" +
                                                        "<option value='早退' >早退</option>" +
                                                        "<option value='晚到' selected>晚到</option></select></div>");
                                                }
                                            }
                                        });
                                        $("#tmp").append("<div class='text-right'><button style='float: right;' type='submit' class='btn btn-primary'>提交</button></div>");
                                    }
                                    else{
                                        $("#tmp").append("<p>尚未填寫</p>");
                                        char[1]="";
                                        $.each(char, function(index2) {
                                            if(char[index2]!=""){
                                                $("#tmp").append("<div class='form-group'>" +
                                                    "<label for='q' class='inline'>"+char[index2]+"</label>"+
                                                    "<select name='q' class='form-control-itemname' style='width: 80px;display:inline;'>"+
                                                    "<option selected='selected' disabled='disabled'  style='display: none' value=''></option>"+
                                                    "<option value='到'>到</option>"+
                                                    "<option value='不到' >不到</option>"+
                                                    "<option value='早退' >早退</option>"+
                                                    "<option value='晚到' >晚到</option></select></div>");
                                            }
                                        });
                                        $("#tmp").append("<div class='text-right'><button style='float: right;' type='submit' class='btn btn-primary'>提交</button></div>");
                                    }
                                },
                                error:function(xhr){
                                    alert("發生錯誤:1 " + xhr.status + " " + xhr.statusText);
                                }
                            });
                        });
                    },
                    error:function(xhr){
                        alert("發生錯誤: " + xhr.status + " " + xhr.statusText);
                    }
                });

            });
            $('.dropbtn').one().click();
            $('.dropbtn').one().click();

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
                    "method": "read_attend",
                    "query":"q",
                    "user":$("#name").val(),
                    month:date,
                },
                url: "https://script.google.com/macros/s/AKfycbwPIzTzCBQ0DlUAq7zBlCxKa3rZ7l-eoksCeHRAvICiz6fPiQOYihKv5_jcfuHv-uzX/exec", // 填入網路應用程式網址
                success: function (form_data) {
                    $('#tmp').html('');
                    var char=form_data.split('-');
                    $('#customerz1').html(char[0].substring(5)+"月出席");
                    $("#tmp").append("<input type='hidden' name='month' value='" +char[0]+ "'>");
                    char[0]='';
                    var cut;
                    if(char[1]=="1"){
                        char[1]="";
                        $.each(char, function(index2) {
                            if(char[index2]!=""){
                                cut=char[index2].split(',');
                                if(cut[1]=="到") {
                                    $("#tmp").append("<div class='form-group'>" +
                                        "<label for='q' class='inline'>" + cut[0] + "</label>" +
                                        "<select name='q' class='form-control-itemname' style='width: 80px;display:inline;'>" +
                                        "<option value='到' selected>到</option>" +
                                        "<option value='不到' >不到</option>" +
                                        "<option value='早退' >早退</option>" +
                                        "<option value='晚到' >晚到</option></select></div>");
                                }
                                else if(cut[1]=="不到"){
                                    $("#tmp").append("<div class='form-group'>" +
                                        "<label for='q' class='inline'>" + cut[0] + "</label>" +
                                        "<select name='q' class='form-control-itemname' style='width: 80px;display:inline;'>" +
                                        "<option value='到' >到</option>" +
                                        "<option value='不到' selected>不到</option>" +
                                        "<option value='早退' >早退</option>" +
                                        "<option value='晚到' >晚到</option></select></div>");
                                }
                                else if(cut[1]=="早退"){
                                    $("#tmp").append("<div class='form-group'>" +
                                        "<label for='q' class='inline'>" + cut[0] + "</label>" +
                                        "<select name='q' class='form-control-itemname' style='width: 80px;display:inline;'>" +
                                        "<option value='到' >到</option>" +
                                        "<option value='不到' >不到</option>" +
                                        "<option value='早退' selected>早退</option>" +
                                        "<option value='晚到' >晚到</option></select></div>");
                                }
                                else if(cut[1]=="遲到"){
                                    $("#tmp").append("<div class='form-group'>" +
                                        "<label for='q' class='inline'>" + cut[0] + "</label>" +
                                        "<select name='q' class='form-control-itemname' style='width: 80px;display:inline;'>" +
                                        "<option value='到' >到</option>" +
                                        "<option value='不到' >不到</option>" +
                                        "<option value='早退' >早退</option>" +
                                        "<option value='晚到' selected>晚到</option></select></div>");
                                }
                            }
                        });
                        $("#tmp").append("<div class='text-right'><button type='submit' class='btn btn-primary'>提交</button></div>");
                    }
                    else{
                        $("#tmp").append("<p>尚未填寫</p>");
                        char[1]="";
                        $.each(char, function(index2) {
                            if(char[index2]!=""){

                                $("#tmp").append("<div class='form-group'>" +
                                    "<label for='q' class='inline'>"+char[index2]+"</label>"+
                                    "<select name='q' class='form-control-itemname' style='width: 80px;display:inline;'>"+
                                    "<option selected='selected' disabled='disabled'  style='display: none' value=''></option>"+
                                    "<option value='到' >到</option>"+
                                    "<option value='不到' >不到</option>"+
                                    "<option value='早退' >早退</option>"+
                                    "<option value='晚到' >晚到</option></select></div>");
                            }
                        });
                        $("#tmp").append("<div class='text-right'><button type='submit' class='btn btn-primary'>提交</button></div>");
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

    <div  style="margin-left: 30px;">
        <div class="dropdown">
            <button class="dropbtn"><span>選擇月份</span></button>
            <div id="myDropdown" class="dropdown-content">
            </div>
        </div>
    </div>
    <h1  id="customerz1" style="text-align: center;margin-top: 1%">出席</h1>
    <main class="content" >
        <iframe name="hidden_iframe" style="display: none;"></iframe>
        <form  action="https://script.google.com/macros/s/AKfycbwPIzTzCBQ0DlUAq7zBlCxKa3rZ7l-eoksCeHRAvICiz6fPiQOYihKv5_jcfuHv-uzX/exec" method="POST" role="form" target="hidden_iframe" onsubmit="return touch();">
            @csrf
            <input type="hidden" name="method" value="write_attend" >
            <input type="hidden" id="name" name="name" value={{auth()->user()->name}}>
            <input type="hidden" name="part" value={{auth()->user()->part}}>
            <input type="hidden" name="question" value="">
            <div id="tmp">
            </div>
        </form>
    </main>
    @include('layouts.footer')
@endsection
