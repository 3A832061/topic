@extends('layouts.partials.type')
@section('title','管樂社')
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
            width: 60%;
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
        #layoutSidenav_content
        {
            margin-left:200px !important;
            margin-bottom:100px !important;
        }
    </style>
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function success(id){
            var form="form"+id;

            var name="now"+id;
            var tmp=document.getElementById(name);
            if(!tmp.checked){
                tmp.value=0;
                tmp.checked=true;
            }

            name="pay"+id;
            tmp=document.getElementById(name);
            if(tmp!=null){
                if(!tmp.checked){
                    tmp.value=0;
                    tmp.checked=true;
                }
            }

            document.getElementById(form).submit();
        }
        function doubleCheck($id){
            var msg;
            if(document.getElementsByName('pos')[0].value!="社員"){
                msg = "您要交接幹部了嗎？\n前一任幹部會改為社員權限\n請確認！";
            }
            else{
                msg = "修改權限為社員\n請確認！";
            }
            if (confirm(msg)==true) {
                success($id);
            }
        }
    </script>
@endsection
@section('index.con')
    @include('layouts.nav')

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>

    <div class="container mt-3" style="margin-bottom: 5%;">
        @if($type=='now')
        <h2 style="margin-top: 5%;">社員清單</h2>
        @elseif($type=='full')
            <h2 style="margin-top: 5%;">所有社員</h2>
            @endif
        <br>
        <table class="table table-hover" >
            <thead>
            <tr>
                <th>名字</th>
                <th>聲部別</th>
                <th>班級</th>
                <th>學號</th>
                <th>手機</th>
                @if($type=='now')
                    <th width="80px">職位</th>
                @endif
                <th width="80px">入社時間</th>
                <th>電子信箱</th>
                @if($type=='now')
                    <th>繳交社費?</th>
                @endif
                <th>現任社員?</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <form id="form{{$user->id}}" action={{ route('user.adminUpdate',$user->id) }} method="POST" role="form">
                    @method('PUT')
                    @csrf
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->part}}</td>
                        <td>{{$user->class}}</td>
                        <td>{{$user->acc}}</td>
                        <td>{{$user->phone}}</td>
                        @if($type=='now')
                        <td>
                                @if(auth()->user()->pos=="社長"|| auth()->user()->pos=='文書')
                                    <select name="pos" class="form-control" onchange="doubleCheck({{$user->id}})" >
                                        <option value="社員" {{ ($user->pos=="社員")?'selected':'' }}>社員</option>
                                        <option value="社長" {{ ($user->pos=="社長")?'selected':'' }}>社長</option>
                                        <option value="副社" {{ ($user->pos=="副社")?'selected':'' }}>副社</option>
                                        <option value="總務" {{ ($user->pos=="總務")?'selected':'' }}>總務</option>
                                        <option value="譜務" {{ ($user->pos=="譜務")?'selected':'' }}>譜務</option>
                                        <option value="器材" {{ ($user->pos=="器材")?'selected':'' }}>器材</option>
                                        <option value="文書" {{ ($user->pos=="文書")?'selected':'' }}>文書</option>
                                        <option value="美宣" {{ ($user->pos=="美宣")?'selected':'' }}>美宣</option>
                                        <option value="公關" {{ ($user->pos=="公關")?'selected':'' }}>公關</option>
                                    </select>
                                @else
                                    {{$user->pos}}
                                @endif

                        </td>
                        @endif
                            <?php
                                $year=date_format($user->created_at,'Y/m/d');
                            ?>
                        <td>{{$year}}</td>
                        <td>{{$user->email}}</td>

                        @if($type=='now')
                            <td>
                                <input type="checkbox" id="pay{{$user->id}}"  name="pay" value=1  @if(auth()->user()->pos=='總務') onclick="success({{$user->id}})"  @else onclick="return false;" @endif {{ ($user->pay==1 )?'checked':'' }}>
                            </td>
                        @endif

                        <td>
                            <input type="checkbox" id="now{{$user->id}}" name="now" value=1 @if(auth()->user()->pos=='社長'|| auth()->user()->pos=='文書') onclick="success({{$user->id}})"  @else onclick="return false;" @endif {{ ($user->now==1 )?'checked':'' }} >
                        </td>
                    </tr>
                </form>
            @endforeach
            </tbody>
        </table>
    </div>

    @include('layouts.footer')
@endsection
