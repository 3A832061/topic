@extends('layouts.partials.type')
@section('title','管樂社')
@section('form.css')
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        .row {
            display: flex;
        }

        /* Create two equal columns that sits next to each other */
        .column {
            flex: 50%;
            padding: 10px;
        }

        .form{
            padding-left: 50%;
        }

        @media screen and (max-width: 1200px) {
            .column {
                width: 100%;
                flex: 100%;
            }
            .form{
                padding-left: 2%;
            }
        }

        .form-control-itemname
        {
            display: inline;
            width: 100%;
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
    <div class="row">
        <div class="column" style="background-color:#aaa;">
            <center>
                <h1 class="mt-4" id="customerz1"style="align-content: center">修改日程</h1>
            </center>

            <!-- /.row -->
            <p>
            <div class="row">
                <div class="col-lg-8">
                    <div class="form">
                        <form action={{route('calendar.update',$calendar->id)}} method="POST" role="form" >
                            @csrf
                            <div class="form-group">
                                <label for="date" class="inline">時間：</label>
                                <input name="date" class="form-control-itemname" placeholder="ex：5/5（四） 18:30~21:30" value="{{$calendar->date}}">
                            </div>

                            <div class="form-group">
                                <label for="title" class="inline">內容：</label>
                                <input name="title" class="form-control-itemname" placeholder="ex：團練、社課、迎新一籌...等" value="{{$calendar->title}}">
                            </div>

                            <div class="form-group">
                                <label for="tag" class="inline" >標籤：</label>
                                <select name="tag" class="form-control" style="width: 100%">
                                    <option value="練習" {{ ($calendar->tag=="練習")?'selected':'' }}>練習</option>
                                    <option value="開會" {{ ($calendar->tag=="開會")?'selected':'' }}>開會</option>
                                    <option value="活動" {{ ($calendar->tag=="活動")?'selected':'' }}>活動</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="month" class="inline">月份：</label>
                                <input name="month" type="form-control-itemname" class="form-control-itemname" value={{$calendar->month}}>
                            </div>

                            <div class="form-group">
                                <label for="remark" class="inline">備註：</label>
                                <input name="remark" type="form-control-itemname" class="form-control-itemname" value={{$calendar->remark}}>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="column" style="background-color:#bbb;">
            <div class="container-fluid px-4">
                <center>
                    <h1 class="mt-4" id="customerz1">已設定的日程</h1>
                </center>
            </div>
            @if(count($types)>0)
                <table>
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn">全部</button>
                                <div id="myDropdown" class="dropdown-content">
                                    @foreach($types as $type)
                                        <a href={{ route('calendar.create',$type->month) }}>{{$type->month}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                    @foreach($list as $item)
                        <tr >
                            <td>{{$item->date}}</td>
                            <td>{{$item->title}}</td>
                            <td><a style="display: inline" href={{route('calendar.edit',$item->id)}}>修改</a><td>
                            <td>
                                <form action="{{ route('calendar.destroy',$item->id) }}" method="POST" style="display: inline">
                                    @method('DELETE')
                                    @csrf
                                    <button  class="btn btn-sm btn-danger" type="submit">刪除</button>
                                </form>
                            </td>
                        <tr>
                    @endforeach
                </table>
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
    </script>
@endsection
