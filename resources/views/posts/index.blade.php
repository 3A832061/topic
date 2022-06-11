@extends('layouts.partials.type')
@section('form.css')

<style>
    .ccc {
        color: #444;
        border: none;
    }

    .td {
        border-bottom: 1px solid #ddd;
        text-align: center;
        vertical-align: middle;
        width: 25%;
    }

    .ccc:after {
        content: '\25B2';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .a:after {
        content: "\25BC";
    }
</style>
<script>
    function doubleCheck(){
        var msg = "您真的確定要刪除嗎？\n\n請確認！";
        if (confirm(msg)==true){
            return true;
        }else{
            return false;
        }
    }

    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("myTable");
        switching = true;
        dir = "asc";
        while (switching) {
            switching = false;
            rows = table.rows;
            var th = rows[0].getElementsByTagName("th")[n];
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;

                x = rows[i].getElementsByTagName("td")[n];
                y = rows[i + 1].getElementsByTagName("td")[n];

                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        for(var j=0;j<3;j++){
                            var a=rows[0].getElementsByTagName("th")[j];
                            if(j==n){
                                th.classList.toggle("a");
                            }
                            else if(a.classList.contains('a')){
                                a.classList.toggle("a");
                            }
                        }
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        for(var j=0;j<3;j++){
                            var a=rows[0].getElementsByTagName("th")[j];
                            if(j==n){
                                th.classList.toggle("a");
                            }
                            else if(a.classList.contains('a')){
                                a.classList.toggle("a");
                            }
                        }
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>
@endsection
@section('title','管樂社')
@section('index.con')
    @include('layouts.nav')
    <main class="flex-shrink-0">
    <!-- Page Content-->
    <section class="py-5">
        <div class="container mt-3">
            <h2 align="center">{{$tag}}</h2>
            @if ( auth()->check())
                @if(auth()->user()->pos!='社員')
                    <a class="btn btn-sm btn-success" href={{ route('posts.create') }}>新增公告</a>
                @endif
            @endif
            <p>
            <table id="myTable"  style="width: 100%;table-layout: fixed;">
                <thead>
                    <tr>
                        <th class="td ccc" onclick="sortTable(0)" style="border-bottom: 2px solid #000;cursor: pointer;">類別</th>
                        <th class="td ccc" onclick="sortTable(1)" style="border-bottom: 2px solid #000;cursor: pointer;">日期</th>
                        <th class="td ccc" onclick="sortTable(2)" style="border-bottom: 2px solid #000;cursor: pointer;">標題</th>
                        @if( auth()->check())
                            @if(auth()->user()->pos!='社員')
                                <th class="td" style="border-bottom: 2px solid #000;"> </th>
                            @endif
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td class="td">
                                <a style="text-decoration:none;color: black;" href={{route('posts.index',$post->tag)}}>{{$post->tag}}</a>
                            </td>
                            <td class="td">{{$post->date}}</td>
                            <td class="td">
                                <a style="text-decoration:none;color: black;" href={{route('posts.show',$post->id)}}><label style="width: 100%; overflow:hidden;white-space: nowrap;text-overflow: ellipsis;">{{$post->title}}</label></a>
                            </td>

                            @if ( auth()->check())
                                @if(auth()->user()->pos!='社員')
                                <td class="td">
                                    <a class="btn btn-sm btn-primary" href={{route('posts.edit',$post->id)}}>修改</a>
                                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST" style="display: inline">
                                        @method('DELETE')
                                        @csrf
                                        <button  class="btn btn-sm btn-danger" type="submit" onclick="javascript:return doubleCheck();">刪除</button>
                                    </form>
                                </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    </main>
    @include('layouts.footer')
@endsection
