@extends('layouts.partials.type')
@section('title','管樂社')
@section('outfit.css')
    <style>

        .collapsible {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 18px;
        }

        .collapsible:after {
            content: '\25bc';
            color: #a3a3a3;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .active:after {
            content: "\25b2";
            /*符號對照 https://oinam.github.io/entities/*/
        }
        .active, .collapsible:hover {
            background-color: #ccc;
        }
        .content {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            text-align:left;
            margin-top: 25px;
        }

        .fonsizeli
        {
            font-size: 14pt;
        }
        .col-lg-6
        {
            margin-bottom: 25px;
        }
        .mb-4
        {
            margin-bottom: 0 !important;
        }
    </style>
@endsection
@section('index.con')
    <main class="flex-shrink-0">
        @include('layouts.nav')
        <section class="py-1">
            <div class="container px-5 my-4">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-4" >
                            <h1 class="fw-bolder">獎項紀錄</h1>
                        </div>
                    </div>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-4">
                            <button type="button" class="collapsible">110學年度</button>
                            <div class="content">
                                <ul class="fonsizeli" style="list-style-type: disc">
                                    <li>1</li><li>2</li><li>3</li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center mb-2">
                            <button type="button" class="collapsible">109學年度</button>
                            <div class="content">
                                <ul  class="fonsizeli" style="list-style-type: disc">
                                    <li>1</li><li>2</li><li>3</li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center mb-2">
                            <button type="button" class="collapsible"> 108學年度</button>
                            <div class="content">
                                <ul  class="fonsizeli" style="list-style-type: disc">
                                    <li>1</li><li>2</li><li>3</li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center mb-5">
                            <button type="button" class="collapsible">其他學年度</button>
                            <div class="content">
                                <ul  class="fonsizeli" style="list-style-type: disc">
                                    <li>1</li><li>2</li><li>3</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight){
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>
    @include('layouts.footer')
@endsection
