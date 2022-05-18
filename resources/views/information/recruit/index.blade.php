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
    <main class="flex-shrink-0">
        @include('layouts.nav')
        <section class="py-5">
            @if (Route::has('login'))
                @auth
                    @if(!$recruit)
                        <a class="button button4" href={{route('recruit.create')}}>新增介紹</a>
                    @else
                        <a class="button button4" href={{ route('recruit.edit', $recruit->id) }}>修改簡介</a>
                    @endif
                @endauth
            @endif
                <a class="button button4" href={{ route('recruit.list') }}>查看填寫資料</a>
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <h1 class="fw-bolder" style="text-align: center;">介紹</h1>
                    @if($recruit)
                        <ul style="list-style-typ: disc; padding-left: 25%;">
                            <?php
                            $string=$recruit->content;
                            $cutchar = explode('\n', $string);
                            foreach ($cutchar as $item){
                                echo "<li>".$item."</li>";
                            }
                            ?>
                        </ul>
                    @else
                        <p class="lead fw-normal text-muted mb-0">
                            暫無資料
                        </p>
                    @endif
                </div>
            </div>
            <a class="button button4" style="float:right;"  href={{route('recruit.show')}}>下一頁</a>
        </section>
    </main>
    @include('layouts.footer')
@endsection
