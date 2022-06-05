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
            @if ( auth()->check())
                @if(auth()->user()->pos!='社員')
                    @if(!$introduction)
                        <a class="button button4" href={{route('introduction.create')}}>新增簡介</a>
                    @else
                        <a class="button button4" href={{ route('introduction.edit', $introduction->id) }}>修改簡介</a>
                    @endif
                @endif
            @endif
            <div class="container px-5 my-5">

                <div class="row gx-5 justify-content-center">

                        <div class="text-center mb-5">
                            <h1 class="fw-bolder">社團介紹</h1>
                            @if($introduction)
                                <p class="lead fw-normal text-muted mb-0">
                                    {{$introduction->content}}
                                </p>
                            @else
                                <p class="lead fw-normal text-muted mb-0">
                                    暫無資料
                                </p>
                            @endif
                        </div>
                </div>
                @if($introduction)
                    <div class="row gx-5">
                        <div class="col-12">
                            <img class="img-fluid rounded-3 mb-5" src={{asset('images/introduction/'.$introduction->picture)}} alt="..." />
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </main>
    @include('layouts.footer')
@endsection
