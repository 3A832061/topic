@extends('layouts.partials.type')
@section('title','管樂社')
@section('index.con')
    <main class="flex-shrink-0">
        @include('layouts.nav')
        <section class="py-5">

            <div class="container px-5 my-5">

                <div class="row gx-5 justify-content-center">

                        <div class="text-center mb-5">
                            <h1 class="fw-bolder" style="display: inline;">社團介紹
                            @if ( auth()->check())
                                @if(auth()->user()->pos!='社員')
                                    @if(!$introduction)
                                        <a class="btn btn-success" href={{route('introduction.create')}}>新增</a>
                                    @else
                                        <a class="btn btn-primary" href={{ route('introduction.edit', $introduction->id) }}>修改</a>
                                    @endif
                                @endif
                            @endif
                            </h1>
                            <br> <br>
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
