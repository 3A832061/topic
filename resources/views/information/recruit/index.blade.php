@extends('layouts.partials.type')
@section('title','管樂社')
<style>

</style>
@section('index.con')
@include('layouts.nav')

        <div style="margin: auto;margin-top: 5%;margin-bottom: 5%;">
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
                <pre style="">
                <?php
                    if($recruit->content){
                        $string = $recruit->content;
                        $string = str_replace("\n","\n</li><li style='font-size:18px;'>",$string);
                        $string = "<li style='font-size:18px;'>".$string."</li>";
                        echo $string;
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
            <br>
            <br>
            @if (!auth()->check())
                <a class="btn btn-success" style="float:right;"  href={{route('recruit.show')}}>填寫表單</a>
            @else
                <a class="btn btn-secondary" style="float:right;" href={{ route('recruit.list') }}>查看填寫資料</a>
            @endif
        </div>
    @include('layouts.footer')
@endsection
