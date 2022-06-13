@extends('layouts.partials.type')
@section('title','管樂社')
<style>
    .button {
        background-color: #04AA6D;
        width: 120px;
        border: none;
        color: white;
        padding: 5px;
        text-align: center;


        font-size: 16px;
        margin: 4px 2px;
    }

    .button4 {border-radius: 12px;}

</style>
@section('index.con')
@include('layouts.nav')
        <div style="padding-top: 5%;margin: auto;margin-bottom: 5%;">
            <h1 style="text-align: center;">介紹
                @if(auth()->check())
                    @if(auth()->user()->pos!="社員")
                        @if(!$recruit)
                            <a class="btn btn-success" href={{route('recruit.create')}}>新增介紹</a>
                        @else
                            <a class="btn btn-primary" href={{ route('recruit.edit', $recruit->id) }}>修改簡介</a>
                        @endif
                    @endif
                @endif
            </h1>
            @if($recruit)
                <pre style="margin: auto;padding-left: 5%;padding-right: 5%;">
                <?php
                    if($recruit->content){
                        $string = $recruit->content;
                        $string = str_replace("\n","\n</li><li>",$string);
                        $string = "<li>".$string."</li>";
                        echo "<pre style='white-space: pre-wrap;word-wrap: break-word;font-size: 16px;'>".$string."</pre>";
                    }else{
                        echo "<p>無資料，請按「新增」，新增資料</p>";
                    }
                    ?>
                </pre>
            @else
                <p class="lead fw-normal text-muted mb-0">
                    暫無資料
                </p>
            @endif

            @if (!auth()->check())
                <a class="button button4" style="float:right;margin-right: 5%;"  href={{route('recruit.show')}}>填寫表單</a>
            @else
                <a class="btn btn-secondary" style="float:right;margin-right: 5%;" href={{ route('recruit.list') }}>查看填寫資料</a>
            @endif
        </div>
    @include('layouts.footer')
@endsection
