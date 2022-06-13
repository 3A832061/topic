@extends('layouts.partials.type')
@section('title','管樂社')
@section('form.css')
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">
    <style>
        layoutSidenav_content {
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

        .dropbtn:hover, .dropbtn:focus {
            background-color: #2980B9;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 60px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .item{
            width: 100%;
        }

        .item:hover, .item:focus, .item:active{
            background-color: #2980B9;
        }

        .td {
            border-bottom: 1px solid #ddd;
            text-align: center;
            vertical-align: middle;
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

        function doubleCheck(){
            var msg = "您真的確定要刪除嗎？\n\n請確認！";
            if (confirm(msg)==true){
                return true;
            }
            else{
                return false;
            }
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
                        "method": "read",
                        "query": "month"
                    },
                    url: "https://script.google.com/macros/s/AKfycbx7nsrV_jO3E8RNBS1_s-5hsvVj_dRBRwJfx1EEdmkgNSw7obF8Y1NtOeZUAyc332LE/exec", // 填入網路應用程式網址
                    success: function (e) {
                        var char=e.split('-');
                        $.each(char, function(index, element) {
                            if(element!=''){
                                $(".dropdown-content").append("<button id='" + element + "' class='item'>" + element + "</button>");
                            }
                        });
                        $('.item').on('click',function(){
                            var id=this.id;
                            $("h1").text(id.substring(0,3)+"學年第"+id.substring(3,4)+"學期收支清單");
                            $("p").text("");
                            $.ajax({
                                type: "post",
                                data: {
                                    "method": "read",
                                    "query":id
                                },
                                url: "https://script.google.com/macros/s/AKfycbx7nsrV_jO3E8RNBS1_s-5hsvVj_dRBRwJfx1EEdmkgNSw7obF8Y1NtOeZUAyc332LE/exec", // 填入網路應用程式網址
                                success: function (e1) {
                                    var char=e1.split('(<)');
                                    $('#tab tbody').html("");

                                    $.each(char, function(index2) {
                                        if(char[index2]!=""){
                                            var subchar=char[index2].split('(-)');
                                            $('#tab tbody').append("<tr>");

                                            $.each(subchar,function (index3){
                                                $("#tab tbody").append("<td class='td'>"+subchar[index3]+"</td>");
                                            });
                                            $("#tab tbody").append("<td class='td'><button type='button' class='btn btn-danger' id='"+index2+"'>刪除</button></td></tr>");
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
                                                url: "https://script.google.com/macros/s/AKfycbx7nsrV_jO3E8RNBS1_s-5hsvVj_dRBRwJfx1EEdmkgNSw7obF8Y1NtOeZUAyc332LE/exec",
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
        });
    </script>
@endsection
@section('index.con')
    @include('layouts.nav')
    <!-- 公告-->
    <main class="flex-shrink-0">
        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">
                <div class="dropdown">
                    <button class="dropbtn">
                        <span>選擇學期</span>
                    </button>
                    <div id="myDropdown" class="dropdown-content">

                    </div>
                </div>
                    <div class="container mt-3">
                        <h1 class="mt-4" id="customerz1">社費清單</h1>
                        <p>請選擇學期</p>
                        <br>
                        <div style="overflow-x:auto;">
                        <table id="tab"  style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="td" style="border-bottom: 2px solid #000;">日期</th>
                                    <th class="td" style="border-bottom: 2px solid #000;">收入/支出</th>
                                    <th class="td" style="border-bottom: 2px solid #000;">來源/用途</th>
                                    <th class="td" style="border-bottom: 2px solid #000;">單價</th>
                                    <th class="td" style="border-bottom: 2px solid #000;">數量</th>
                                    <th class="td" style="border-bottom: 2px solid #000;">總額</th>
                                    <th class="td" style="border-bottom: 2px solid #000;">備註</th>
                                    <th class="td" style="border-bottom: 2px solid #000;"></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footer')
@endsection
