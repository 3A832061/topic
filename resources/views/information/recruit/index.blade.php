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
                        <a class="button button4" href={{ route('recruit.list') }}>查看填寫資料</a>
                @endauth
            @endif

            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <h1 class="fw-bolder" style="text-align: center;">介紹</h1>
                    @if($recruit)
                        <pre>
                        <?php
                            if($recruit->content){
                                $string = $recruit->content;
                                $string = str_replace("\n","\n</li><li>",$string);
                                $string = "<li>".$string."</li>";
                                echo "<pre style='white-space: pre-wrap;word-wrap: break-word;font-size: 16px;'>".$string."</pre>";
                            }else{
                                echo "<p>無資料，請按修改新增注意事項</p>";
                            }
                            ?>
                    </pre>
                    @else
                        <p class="lead fw-normal text-muted mb-0">
                            暫無資料
                        </p>
                    @endif
                </div>
            </div>
                @if (Route::has('login'))
                    @auth
                    @else
            <a class="button button4" style="float:right;"  href={{route('recruit.show')}}>下一頁</a>
                    @endauth
                @endif
        </section>
    </main>
    @include('layouts.footer')
@endsection
