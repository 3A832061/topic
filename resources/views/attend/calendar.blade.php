@extends('layouts.partials.type')
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

        @media screen and (max-width: 1200px) {
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

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #ddd}

        /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
        .show {display:block;}
    </style>
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
                    <form action={{route('calendar.store')}} method="POST" role="form" >
                        @csrf
                        <div class="form-group">
                            <label for="date" class="inline">時間：</label>
                            <?php
                                $week=date('l');
                                if($week=='Sunday'){ $week='日'; }
                                elseif($week=='Monday'){ $week='一'; }
                                elseif ($week=='Tuesday'){ $week='二'; }
                                elseif($week=='Wednesday'){ $week='三'; }
                                elseif ($week=='Thursday'){ $week='四'; }
                                elseif($week=='Friday'){ $week='五'; }
                                elseif($week=='Saturday'){ $week='六'; }
                            ?>
                            <input id="date" name="date" onkeyup="changestring()" style="display: inline; width: 65px; height: 34px; padding: 6px 12px;
            font-size: 14px; line-height: 1.42857143; background-color: #fff; background-image: none;
            border: 1px solid #ccc; border-radius: 4px;" placeholder="ex：5/5（四） 18:30~21:30" value="{{date('m/d')}}">
                            <label id="week">（{{ $week }}）</label>
                            <input name="time" style="display: inline; width: 150px; height: 34px; padding: 6px 12px;
            font-size: 14px; line-height: 1.42857143; background-color: #fff; background-image: none;
            border: 1px solid #ccc; border-radius: 4px;" placeholder="ex：5-5（四） 18:30~21:30" value="18：30~21：30">
                        </div>

                        <div class="form-group">
                            <label for="title" >內容：</label>
                            <input name="title" class="form-control-itemname" placeholder="ex：團練、社課、迎新一籌...等" value="">
                        </div>

                        <div class="form-group">
                            <label for="tag" class="inline" >標籤：</label>
                            <select name="tag" style="width: 80px;" class="form-control-itemname">
                                <option value="練習" selected>練習</option>
                                <option value="開會" >開會</option>
                                <option value="活動" >活動</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="month" class="inline">月份：</label>
                            <input id="year" name="month" type="form-control-itemname" class="form-control-itemname" value="{{date('Y-m')}}">
                        </div>

                        <div class="form-group">
                            <label for="remark" class="inline">備註：</label>
                            <input name="remark" type="form-control-itemname" class="form-control-itemname" value="">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">提交</button>
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
            @if(count($types)>0)
                <div style="padding-left: 20%">
                <table>
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn">{{$month}}</button>
                                <div id="myDropdown" class="dropdown-content">
                                    @foreach($types as $type)
                                        <a href={{ route('calendar.create',$type->month) }}>{{$type->month}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                    @foreach($calendars as $calendar)
                        <tr>
                            <td>{{$calendar->date}}</td>
                            <td>{{$calendar->title}}</td>
                            <td><a style="display: inline" href={{route('calendar.edit',$calendar->id)}}>修改</a><td>
                            <td>
                                <form action="{{ route('calendar.destroy',$calendar->id) }}" method="POST" style="display: inline">
                                    @method('DELETE')
                                    @csrf
                                    <button  class="btn btn-sm btn-danger" type="submit">刪除</button>
                                </form>
                            </td>
                        <tr>
                    @endforeach
                </table>
                </div>
            @else
                <p>暫無資料</p>
            @endif
        </div>
    </div>
    @include('layouts.footer')

    <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

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
@endsection
