@extends('layouts.partials.type')
@section('title','諾曼本管樂社 - 出席管理')
@section('form.css')
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        .row-p {
            margin: 0 0;
            height: 100%;
        }

        /* Create two equal columns that sits next to each other */
        .column-p {
            float: left;
            width: 50%;
            padding: 10px 10px;
            height: 100%;
        }

        .row-p:after {
            content: "";
            display: table;
            clear: both;
        }

        .form{
            padding-left: 20%;
        }

        @media screen and (max-width: 750px) {
            .row-p {
                margin: 0 0;
                height: auto;
            }
            .column-p {
                width: 100%;
                flex: 100%;
                height: auto;
            }
            .form{
                padding-left: 20%;
            }
        }

        .form-control-itemname
        {
            display: inline;
            width: 60%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group
        {
            margin-bottom: 15px !important;
        }
        layoutSidenav_content
        {
            margin-left:200px !important;
            margin-bottom:100px !important;
        }

        .dropbtn {
            background-color: #3498DB;
            color: white;
            padding: 16px;
            font-size: 16px;
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

        .item{
            width: 100%;
        }

        .tr{

        }

        .item:hover, .item:focus, .item:active{
            background-color: #2980B9;
        }


        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #ddd}

        /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
        .show {display:block;}
    </style>
    <script>
        // Close the dropdown if the user clicks outside of it
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

        function changestring(){
            var year=document.getElementById("year").value.substring(0,4);
            var x = document.getElementById("date").value;
            const birthday = new Date(year+'-'+x);
            const day1 = birthday.getDay();
            var week;
            if(day1==0){ week='星期天'; }
            else if(day1==1){ week='一'; }
            else if(day1==2){ week='二'; }
            else if(day1==3){ week='三'; }
            else if(day1==4){ week='四'; }
            else if(day1==5){ week='五'; }
            else if(day1==6){ week='六'; }
            document.getElementById("week").innerHTML ='（'+week+'）';
        }

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
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
                            var id=this.id;
                            $.ajax({
                                type: "post",
                                data: {
                                    "method": "read_calendar",
                                    "query":this.id
                                },
                                url: "https://script.google.com/macros/s/AKfycbwPIzTzCBQ0DlUAq7zBlCxKa3rZ7l-eoksCeHRAvICiz6fPiQOYihKv5_jcfuHv-uzX/exec", // 填入網路應用程式網址
                                success: function (e1) {
                                    var char=e1.split('-');
                                    $('#tab tbody').html("");

                                    $.each(char, function(index2) {
                                        if(char[index2]!=""){
                                            trHTML = "<tr><td>"+char[index2]+"</td><td><button id='"+index2+"' class='btn btn-danger'>刪除</button></td></tr>";
                                            $("#tab tbody").append(trHTML);
                                        }
                                    });
                                    $(".btn-danger").one('click',function(){
                                        var bool=confirm("您真的確定要刪除嗎？\n請確認！");
                                        if (bool==true){
                                            $.ajax({
                                                type: "post",
                                                data: {
                                                    "method": "delete",
                                                    "month":id,
                                                    "content": this.id
                                                },
                                                url: "https://script.google.com/macros/s/AKfycbwPIzTzCBQ0DlUAq7zBlCxKa3rZ7l-eoksCeHRAvICiz6fPiQOYihKv5_jcfuHv-uzX/execc",
                                            });
                                            alert("刪除成功");
                                            history.go(0);
                                        }
                                    });
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

            $('#btn_cre').on('click',function(){
                if($("#content").val()!=null &&$("#content").val()!=""){
                    if($("#date").val()!=null &&$("#date").val()!=""){
                        if($("#time").val()!=null &&$("#time").val()!=""){
                            $("#create").submit();
                            alert("提交成功");
                            history.go(0);
                        }
                    }
                }

            });
        });
    </script>
@endsection
@section('index.con')
    @include('layouts.nav')

    <div class="row-p">
        <div class="column-p" style="background-color:#aaa;">
                <center>
                <h1 class="mt-4" id="customerz1"style="align-content: center">新增日程</h1>
                </center>
            <!-- /.row -->
            <p>
                    <div class="form">
                    <iframe name="hidden_iframe" style="display: none;"></iframe>
                    <form id="create" action="https://script.google.com/macros/s/AKfycbwPIzTzCBQ0DlUAq7zBlCxKa3rZ7l-eoksCeHRAvICiz6fPiQOYihKv5_jcfuHv-uzX/exec" method="POST" role="form"  target="hidden_iframe">
                        @csrf
                        <div class="form-group">
                            <input name="method" value="write_calendar"  type="hidden" >
                            <label for="date" class="inline">日期：*</label>
                            <input id="date" name="date" type="date" style="display: inline; width: 150px; height: 34px; padding: 6px 12px;
            font-size: 14px; line-height: 1.42857143; background-color: #fff; background-image: none;
            border: 1px solid #ccc; border-radius: 4px;" required>
                            <input id="time" name="time" style="display: inline; width: 150px; height: 34px; padding: 6px 12px;
            font-size: 14px; line-height: 1.42857143; background-color: #fff; background-image: none;
            border: 1px solid #ccc; border-radius: 4px;" value="18：30~21：30">
                        </div>

                        <div class="form-group">
                            <label for="content" >內容：*</label>
                            <input id="content" name="content" class="form-control-itemname" placeholder="ex：團練、社課、迎新一籌...等" value="" required>
                        </div>

                        <div class="text-right">
                            <button id="btn_cre" type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </form>
                    </div>

        </div>
        <div class="column-p" style="background-color:#bbb;">
            <div class="container-fluid px-4">
                <center>
                    <h1 class="mt-4" id="customerz1">已設定的日程</h1>
                </center>
            </div>

            <div style="padding-left: 20%">
            <table id="tab">
                <thead>
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button class="dropbtn"><span>選擇月份</span></button>
                                <div id="myDropdown" class="dropdown-content">
                                </div>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
