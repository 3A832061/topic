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
                    <h1 class="mt-4" id="customerz1">社費清單</h1>
                    <p>網路發布版可能會有些延遲，不會這麼即時的顯示資料</p>
                </div>
            </main>
        </div>
    </main>
    <iframe  style="width: 100%;height: 100%;" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRzrURRXCQjJkK9Y0aTlDc0Z8NoSXNfRnVLLemz_KL6WYz_P89jjq4b6hG_FedBSz2Jko0rICgU52zi/pubhtml?widget=true&amp;headers=false"></iframe>
    @include('layouts.footer')
@endsection
