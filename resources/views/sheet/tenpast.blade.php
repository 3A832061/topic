@extends('layouts.partials.type')
@section('title','管樂社')
<style>
    #tab-demo{ width:350px; height:200px;}
    #tab-demo > ul{ display:block; margin:0;list-style:none;}
    .tab-title{list-style:none;}
    #tab-demo > ul > li{ display:inline-block; vertical-align:top;font-family:'微軟正黑體'; margin:0 -1px -1px 0 ; border:1px solid #BCBCBC; height:25px; line-height:25px; background:#cdcdcd;padding:0 15px;list-style:none; box-sizing:border-box;}
    #tab-demo >  ul > li a{ color:#000; text-decoration:none;}
    #tab-demo > ul > li.active{ border-bottom:1px solid #fff; background:#fff;}
    #tab-demo > .tab-inner{ clear:both; color:#000; border:1px #BCBCBC solid;}
    .tab-inner{ padding:15px; height:50px;}
    ._3Xz9Z{
        position:relative;
        overflow:hidden;
        width: 100%;
        height:1200px;
    }

    body, html
    {
        height:1980px !important;
    }
    .py-5 bg-white
    {
        padding-top:0px !important;
    }
    th,td
    {
        white-space: nowrap !important;
        border:1px solid #ccc !important;
    }
    .c
    {
        overflow: scroll !important;
    }
</style>
@section('index.con')
    <main class="flex-shrink-0">
        @include('layouts.nav')
        <div>
            <div class="py-5 bg-light">

                <div class="row gx-3 justify-content-center">
                    <div class="col-lg-10 col-xl-7">
                        <div class="text-center">
                            <h1 class="fw-bolder">社團歷年演出曲目</h1>
                            @if ( auth()->check())
                                @if((auth()->user()->pos=='社長')||(auth()->user()->pos=='譜務'))
                            <a class="btn btn-outline-danger btn-lg px-4" href="{{route('sheet.search')}}" >登錄曲目</a>
                                @endif
                            @endif
                            <p>
                        </div>
                    </div>
                </div>
                <center><div class="c col-lg-5">
                    <div class="row gx- justify-content-center">
                    </div>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">演出年份</th>
                            <th scope="col">曲目名稱</th>
                            <th scope="col">中文譯名</th>
                            <th scope="col">作曲者</th>
                            <th scope="col">能否換譜</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x=0;

                        foreach($sheets as $a){
                        echo "<tr>";
                        echo "<th scope='row'>".$a->checkyear;
                        echo "<td>".$a->name."</td>";
                        echo "<td>".$a->zhname."</td>";
                        echo "<td>".$a->composer."</td>";
                        echo "<td>";
                        if(($a->change)==1)
                        {
                            echo "<center><font style='color:red; font-weight: bolder; text-align: center !important;'>✗</center>";
                        }
                        else
                        {
                            echo "<center><font style='color:green; font-weight: bolder; text-align: center !important;'>✓</center>";
                        }
                        echo"</td>";
                        ?>

                        <?php
                        echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
                </center>
            </div>
        </div>
        </div>
    </main>
    <script>

    </script>
    @include('layouts.footer')
@endsection
