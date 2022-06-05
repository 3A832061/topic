@extends('layouts.partials.type')
@section('title','管樂社')
<style>
    .product-buyer-name {
        max-width: 110px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 90%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active, .accordion:hover {
        background-color: #ccc;
    }

    .accordion:after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2212";
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        width: 90%;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

    .button {
        background-color: #04AA6D;
        width: 200px;
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
    function down() {
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
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
                        <h1 class="fw-bolder">組織章程
                            @if ( auth()->check())
                                @if(auth()->user()->pos!='社員')
                                    <a class="button button4" href={{route('organizes.create')}}>新增</a>
                                @endif
                            @endif
                        </h1>
                        <br>
                        @if(count($organizes)==0)
                            <p class="lead fw-normal text-muted mb-0">
                                暫無資料
                            </p>
                        @else
                            @foreach($organizes as $item)
                                <button class="accordion" onclick="down()">{{$item->title}}</button>
                                <div class="panel">
                                    <br>
                                    <span style="">
                                        <?php
                                        if($item->content){
                                            $string = $item->content;
                                            $string = str_replace("\n","\n</li><li>",$string);
                                            $string = "<li>".$string."</li>";
                                            echo "<pre style='white-space: pre-wrap;word-wrap: break-word;font-size: 16px;text-align: left;padding-left: 50px;'>".$string."</pre>";
                                        }else{
                                            echo "<p>無資料，請按修改新增注意事項</p>";
                                        }
                                        ?>
                                    </span>
                                    <label style="text-align: right;align-self: end;">
                                        @if(auth()->check())
                                            @if(auth()->user()->pos!='社員')
                                                <a class="btn btn-sm btn-primary"  href={{ route('organizes.edit',$item->id) }}>修改</a>
                                                <form action="{{ route('organizes.destroy',$item->id) }}" method="POST" style="display: inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button  class="btn btn-sm btn-danger" type="submit" onclick="javascript:return doubleCheck();">刪除</button>
                                                </form>
                                            @endif
                                        @endif
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer')
@endsection
