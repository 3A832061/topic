@extends('layouts.partials.type')
@section('form.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
                    url: "https://script.google.com/macros/s/AKfycbzwcPX8nLTs4qkSeeLSxfZskZ5FpBf1l9hqyGyGdPXKS57cl1eirsKmrpJHZE3xY8Wm/exec", // 填入網路應用程式網址
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
                                    "query":id
                                },
                                url: "https://script.google.com/macros/s/AKfycbzwcPX8nLTs4qkSeeLSxfZskZ5FpBf1l9hqyGyGdPXKS57cl1eirsKmrpJHZE3xY8Wm/exec", // 填入網路應用程式網址
                                success: function (e1) {
                                    var char=e1.split('(<)');
                                    $('#tab tbody').html("");

                                    $.each(char, function(index2) {
                                        if(char[index2]!=""){
                                            var subchar=char[index2].split('(-)');
                                            $('#tab tbody').append("<tr>");

                                            $.each(subchar,function (index3){
                                                $("#tab tbody").append("<td style='vertical-align: middle;text-align: center;'>"+subchar[index3]+"</td>");
                                            });
                                            $("#tab tbody").append("<td><button type='button' class='btn btn-danger' id='"+index2+"'>刪除</button></td></tr>");
                                        }
                                    });

                                    $(".btn-danger").one('click',function(){
                                        var bool=confirm("您真的確定要刪除嗎？\n請確認！");
                                        alert(id);
                                        alert(this.id);
                                        if (bool==true){
                                            $.ajax({
                                                type: "post",
                                                data: {
                                                    "method": "delete",
                                                    "month":id,
                                                    "content": this.id
                                                },
                                                url: "https://script.google.com/macros/s/AKfycbzwcPX8nLTs4qkSeeLSxfZskZ5FpBf1l9hqyGyGdPXKS57cl1eirsKmrpJHZE3xY8Wm/exec",
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
            alert($('.item').first().val());
            if($('.item').length){
                $('.item').first().one().click();
            }
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
                        <button class="dropbtn"><span>選擇月份</span></button>
                        <div id="myDropdown" class="dropdown-content">
                        </div>
                    </div>
                    <div class="container mt-3">
                        <h1 class="mt-4" id="customerz1">社費清單</h1>

                        <table id="tab" class="table table-hover">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>日期</th>
                                    <th>收入/支出</th>
                                    <th>來源/用途</th>
                                    <th>單價</th>
                                    <th>數量</th>
                                    <th>總額</th>
                                    <th>備註</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
        </div>
    </main>
    @include('layouts.footer')
@endsection
