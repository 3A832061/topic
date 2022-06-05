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
<script>
    function doubleCheck(){
        var msg = "您真的確定要刪除嗎？\n\n請確認！";
        if (confirm(msg)==true){
            return true;
        }else{
            return false;
        }
    }
</script>
@section('index.con')
    <main class="flex-shrink-0">
        @include('layouts.nav')
        <section class="py-5">

            <div class="container px-5 my-5">

                <div class="row gx-5 justify-content-center">

                        <div class="text-center mb-5" style="padding-left: 20%;padding-right: 20%;">
                            <h1 class="fw-bolder">組織架構
                                @if ( auth()->check())
                                    @if(auth()->user()->pos!='社員')
                                            <a class="button button4" href={{route('architectures.create')}}>新增</a>
                                        @endif
                                @endif
                            </h1>
                            <br>
                            @if(count($architectures)==0)
                                <p class="lead fw-normal text-muted mb-0">
                                    暫無資料
                                </p>
                            @else
                                @foreach($architectures as $item)
                                    <h4 style="text-align: left;">
                                        {{$item->title}}
                                        @if(auth()->check())
                                            @if(auth()->user()->pos!='社員')
                                                <a class="btn  btn-primary" href={{ route('architectures.edit', $item->id) }}>
                                                    修改
                                                </a>
                                                <form action="{{ route('architectures.destroy',$item->id) }}" method="POST" style="display: inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button  class="btn  btn-danger" type="submit" onclick="javascript:return doubleCheck();">刪除</button>
                                                </form>
                                            @endif
                                        @endif
                                    </h4>
                                    <p style="text-align: left;">
                                        {{$item->content}}
                                    </p>
                                    <br>
                                @endforeach
                            @endif
                        </div>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer')
@endsection
