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
</style>
@section('index.con')
    <main class="flex-shrink-0">
        @include('layouts.nav')
        <div>
            <div class="py-5 bg-light">
                <div class="container px-9 my-5">
                    <div class="row gx-3 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">
                                <h1 class="fw-bolder">社內樂譜清單一覽</h1>
                                <a class="btn btn-outline-danger btn-lg px-4" href={{route('sheet.create')}} >新增曲目</a>
                                <p>
                            </div>
                        </div>
                    </div>
                        <div class="container px-5 my-5">
                            <div class="row gx-5 justify-content-center">
                            </div>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <?php $x=0?>
                                    @foreach($sheets as $sheet)
                                        <?php
                                        if($x==0)
                                    echo "<th scope='col'>編號</th>";
                                        $X=1;
                                        ?>
                                    @endforeach
                                    <th scope="col">曲目名稱</th>
                                    <th scope="col">中文譯名</th>
                                    <th scope="col">作曲者</th>
                                    <th scope="col">編曲者</th>
                                    <th scope="col">存譜缺少聲部</th>
                                    <th scope="col">存放形式</th>
                                    <th scope="col">授權方式</th>
                                    <th scope="col">年份</th>
                                    <th scope="col">購譜價格</th>
                                    <th scope="col">能否換譜</th>
                                    <th scope="col">10年間已演奏</th>
                                    <th scope="col">備註</th>
                                    <th scope="col">負責人</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sheets as $sheet)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                 @endforeach

                                @foreach($sheets as $sheet)
                                @if($sheet->)
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>


                                @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    @include('layouts.footer')
@endsection
