@extends('layouts.partials.type')
<style>

    #top-bar
    {
        display:none !important;
    }

</style>
@section('index.con')
@include('layouts.nav')
    <main class="flex-shrink-0">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" id="customerz1">樂譜缺頁申請單</h1>
                    <a class="btn btn-success flex-shrink-0" href={{route('apply.create')}}>填寫申請單</a>
                </div>
            </main>
        </div>
    </main>
    <iframe style="width: 100%;height: 100%;" title="Embedded Content" name="htmlComp-iframe"
     src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTQ6v6cx6LEE3BWmaORfu-uxD3wdevdEQxpfgIyDq3vx0T2c6UH8I2wc28c0aU8M-rxBbm388jR94Xz/pubhtml?widget=true&amp;headers=false" >

    </iframe>

@include('layouts.footer')
@endsection
