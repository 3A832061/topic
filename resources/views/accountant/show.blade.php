@extends('layouts.partials.type')
@section('form.css')
    <style>
        * {
            box-sizing: border-box;
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
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.dropbtn').one('click',function(){
                $.ajax({
                    type: "post",
                    data: {
                        "method": "read",
                        "query": "month"
                    },
                    url: "https://script.google.com/macros/s/AKfycbzTpdmicws0kvgZB9ux4ZGrDANoy_siT6dwkpRgxTQMATnLavP1a37rj1wLWEIAJrwV/exec", // 填入網路應用程式網址
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
                                    "method": "read",
                                    "query":this.id
                                },
                                url: "https://script.google.com/macros/s/AKfycbzTpdmicws0kvgZB9ux4ZGrDANoy_siT6dwkpRgxTQMATnLavP1a37rj1wLWEIAJrwV/exec", // 填入網路應用程式網址
                                success: function (e1) {
                                    var char=e1.split('-');
                                    $('#tab tbody').html("");

                                    var trHTML="<iframe name='hidden_iframe' style='display: none;'></iframe>" +
                                        "<form id='delete' action='https://script.google.com/macros/s/AKfycbznuT6MCeLJ8D4iAmg2L0YBFNOC46d3sWnEHmoUGe6wt2a2yAEQ3PhUoENC7k2hZ2MU/exec' method='POST' role='form' target='hidden_iframe'>"+
                                        "<input type='hidden' name='method' value='delete'>" +
                                        "<input id='mmmm' type='hidden' name='month' value='"+id+"'>" +
                                        "<input type='hidden' id='delData' name='content'>";

                                    $("#tab tbody").append(trHTML);

                                    $.each(char, function(index2) {
                                        if(char[index2]!=""){
                                            trHTML = "<tr><td>"+char[index2]+"</td>" +
                                                "<td><button value='"+index2+"' class='btn btn-danger'>刪除</button></td></tr>";
                                            $("#tab tbody").append(trHTML);
                                        }
                                    });
                                    $('#tab tbody').append("</form>");

                                    $(".btn-danger").on('click',function(){
                                        $("#delData").val($(this).val());
                                        var bool=confirm("您真的確定要刪除嗎？\n請確認！");
                                        if (bool==true){
                                            $("#delete").submit();
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
                    if($("#date").val()!=null &&$("#content").val()!=""){
                        if($("#time").val()!=null &&$("#content").val()!=""){
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
    <!-- 公告-->
    <main class="flex-shrink-0">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" id="customerz1">社費清單</h1>
                    <p>網路發布版可能會有些延遲，不會這麼即時的顯示資料</p>
                    <div class="dropdown">
                        <button class="dropbtn"><span>選擇月份</span></button>
                        <div id="myDropdown" class="dropdown-content">
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </main>
    <iframe  style="width: 100%;height: 100%;" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRzrURRXCQjJkK9Y0aTlDc0Z8NoSXNfRnVLLemz_KL6WYz_P89jjq4b6hG_FedBSz2Jko0rICgU52zi/pubhtml?widget=true&amp;headers=false"></iframe>
    @include('layouts.footer')
@endsection
