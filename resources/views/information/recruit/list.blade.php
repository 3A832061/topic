@extends('layouts.partials.type')
@section('form.css')
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">

@endsection
@section('index.con')
    @include('layouts.nav')
    <!-- 公告-->
    <main class="flex-shrink-0">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" id="customerz1">新生清單</h1>
                    <p>網路發布版可能會有些延遲，不會這麼即時的顯示資料</p>
                </div>
            </main>
        </div>
    </main>
    <iframe style="width: 100%;height: 100%;"  src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSJu0j-5rGKHrsUD8nFqx5_PKt4zmXRdogtTkGiur4KdFAeoLVWCgo2vfcs0dfWi4Q1cMrFlxN4Jpu0/pubhtml?widget=true&amp;headers=false"></iframe>

    @include('layouts.footer')
@endsection
