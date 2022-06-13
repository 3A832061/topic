@extends('layouts.partials.type')
@section('form.css')
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
@endsection
@section('title','管樂社')
@section('index.con')
    @include('layouts.nav')
    <main class="flex-shrink-0">
    <!-- Page Content-->
        <div style="padding-left: 10%;padding-top: 50px;">
            <div id="layoutSidenav_content">
                <h2>歷屆社團評鑑紀錄 <a class="btn btn-sm btn-success" href={{ route('evaluations.create') }}>新增紀錄</a></h2>
                @if(count($evaluations)>0)
                    @foreach($evaluations as $item)
                    <button class="accordion" onclick="down()">{{$item->title}}</button>
                    <div class="panel">
                        <br>
                        <p style="float: right;">
                            <a class="btn btn-sm btn-primary"  href={{ route('evaluations.edit',$item->id) }}>修改</a>
                        </p>
                        <p>{{$item->remark}}</p>
                        <p>
                            <?php
                                if($item->content){
                                    $string = $item->content;
                                    $string = str_replace("\n","\n</li><li>",$string);
                                    $string = "<li>".$string."</li>";
                                    echo "<pre style='white-space: pre-wrap;word-wrap: break-word;font-size: 16px;'>".$string."</pre>";
                                }else{
                                    echo "<p>無資料，請新增資料。</p>";
                                }
                            ?>
                        </p>

                    </div>
                    @endforeach
                @else
                    <p>無資料，請新增資料。</p>
                @endif
            </div>
        </div>

    </main>
    @include('layouts.footer')
@endsection
