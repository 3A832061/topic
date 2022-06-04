@extends('layouts.partials.type')
@section('form.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .product-buyer-name {
        max-width: 110px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active, .accordion:hover {
    }

    .accordion:after {
        content: '\25B2';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .active:after {
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
                                th.classList.toggle("active");
                            }
                            else if(a.classList.contains('active')){
                                a.classList.toggle("active");
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
                                th.classList.toggle("active");
                            }
                            else if(a.classList.contains('active')){
                                a.classList.toggle("active");
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
            <table id="myTable" class="table table-hover" style="table-layout:fixed;">
                <thead>
                <tr>
                    <th class="accordion" onclick="sortTable(0)" style="width: 100px;cursor: pointer;">類別</th>
                    <th class="accordion" onclick="sortTable(1)" style="width: 125px;cursor: pointer;">日期</th>
                    <th class="accordion" onclick="sortTable(2)" style="cursor: pointer;">標題</th>
                    @if ( auth()->check())
                        @if(auth()->user()->pos!='社員')
                            <th style="width: 125px;"></th>
                            @endif
                    @endif
                </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td >
                                <a style="text-decoration:none;color: black;" href={{route('posts.index',$post->tag)}}>{{$post->tag}}</a>
                            </td>
                            <td >{{$post->date}}</td>
                            <td class="product-buyer-name">
                                <a style="text-decoration:none;color: black;" href={{route('posts.show',$post->id)}}>{{$post->title}}</a>
                            </td>

                            @if ( auth()->check())
                                @if(auth()->user()->pos!='社員')
                                <td>
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
