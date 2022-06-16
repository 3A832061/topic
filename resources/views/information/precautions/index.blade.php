@extends('layouts.partials.type')
@section('form.css')
<style>
    * {box-sizing: border-box}
    body {font-family: "Lato", sans-serif;}

    .tab {
        float: left;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        overflow: auto ;
        overflow-y: scroll;
        width: 120px;
        height: 300px;
    }

    .tab button {
        display: block;
        background-color: inherit;
        color: black;
        padding: 22px 16px;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        transition: 0.3s;
        font-size: 17px;
    }

    .tab button:hover {
        background-color: #ddd;
    }

    .tab button.active {
        background-color: #ccc;
    }

    .tabcontent {
        float: left;
        padding: 12px 12px;
        border: 1px solid #ccc;
        min-width: 60vw;
        width: 60vw;
        max-width: 60vw;
        border-left: none;
        height: 300px;
        overflow-y: auto;
    }

</style>
<script>
    window.onload = function() {
        document.getElementsByClassName("tablinks")[0].click();
    };

    function doubleCheck(){
        var msg = "您真的確定要刪除嗎？\n\n請確認！";
        if (confirm(msg)==true){
            return true;
        }else{
            return false;
        }
    }

    function openCity(evt,cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementsByName(cityName)[0].style.display = "block";
        evt.currentTarget.className += " active";
    }

</script>
@endsection
@section('title','管樂社')
@section('index.con')
    @include('layouts.nav')
    <main class="flex-shrink-0" style="padding-bottom: 30px; display: flex;  justify-content: center;       ">
    <!-- Page Content-->
        <div style="padding-left: 5%;padding-top: 50px; padding-right: 5%">
            <h2>活動注意事項
                <a class="btn btn-sm btn-success" href={{ route('precautions.create') }}>新增活動</a>
            </h2>
            <div class="tab">
                @foreach($precautions as $item)
                    <button id={{$item->title}} class="tablinks" onclick="openCity(event,id)">{{$item->title}}</button>
                @endforeach
            </div>

            @foreach($precautions as $item)
                <div name={{$item->title}} class="tabcontent">
                    <h3>{{$item->title}}
                        <a class="btn btn-sm btn-primary" href={{ route('precautions.edit',$item->id) }}>修改</a>
                    </h3>
                    <pre>
                        <?php
                        if($item->content){
                            $string = $item->content;
                            $string = str_replace("\n","\n</li><li>",$string);
                            $string = "<li>".$string."</li>";
                            echo "<pre style='white-space: pre-wrap;word-wrap: break-word;font-size: 16px;'>".$string."</pre>";
                        }else{
                            echo "<p>無資料，請按修改，新增注意事項</p>";
                        }
                        ?>
                    </pre>
                </div>
            @endforeach
        </div>
    </main>
    @include('layouts.footer')
@endsection
