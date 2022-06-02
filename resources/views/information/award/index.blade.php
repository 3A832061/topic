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
        .collapsible:after .content{
            max-height:100%;
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
            display: none;
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
        a.btn-outline-dark
        {

            margin-right:25px !important;
            text-align: right !important;
        }
        a
        {
            margin:0px 5px 0px 5px;
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

                            <a class="btn btn-success flex-shrink-0" href="{{route('award.create')}}">新增獎項</a>
                        </div>
                    </div>
                </div>

                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8">

                        <div class="text-center mb-4">
                            <?php
                                    $x="";
                                    foreach($awards as $y)
                                        {
                                            $z=$y->year;
                                            if($z!=$x)
                                            {
                                                if($x!="")
                                                {
                                                    echo "</ul>";
                                                    echo "</div>";
                                                }
                                                echo "<button type='button' class='collapsible'>".$z."
                                                </li></button>";
                                                echo "<div class='content'>";
                                                echo "<ul class='fonsizeli' style='list-style-type: disc'>";
                                                $x=$z;
                                            }
                                            if($z==$x)
                                                {
                                                    $id=$y->id;
                                                    $content=$y->content;
                                                    echo "<li><pre style='word-break:; white-space:nowrap; '>".$content;
                                                    ?>
                                                    <a class='btn btn-outline-dark flex-shrink-0' href='{{route('award.edit',$id)}}'>修改</a>
                                                    <form action='{{ route('award.destroy',$id) }}' method='POST' style='display: inline;'>
                                                        @method('DELETE')
                                                        @csrf
                                                        <button  class='btn btn-outline-danger flex-shrink-0' type='submit'>刪除</button>
                                                    </form>
                                                        </pre>
                                                        </li>
                                                    <?php
                                                }
                                        }
                                ?>
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
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>
    @include('layouts.footer')
@endsection
