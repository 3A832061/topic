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
            <!-- Testimonial section-->
            <div class="py-3 bg-transparent">
            </div>
            <div class="py-5 bg-light">
                <div class="container px-9 my-5">
                    <div class="row gx-3 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">

                                <h1 class="fw-bolder">社內樂譜清單一覽</h1>
                                <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>

                                <!--div class="fs-4 mb-4 fst-italic">~</div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="rounded-circle me-3" src="https://images.plurk.com/24qO3V0ymvX3lzLiZufBqL.gif" alt="..." />
                                    <div class="fw-bold">
                                        A
                                        <span class="fw-bold text-primary mx-1">/</span>
                                    </div>
                                </div-->
                            </div>
                        </div>
                    </div>
                    <section class="py-5 bg-white" >
                        <div class="container px-5 my-5">
                            <div class="row gx-5 justify-content-center">
                            </div>
                            <iframe sandbox="allow-same-origin allow-forms allow-popups allow-scripts allow-pointer-lock" class="_3Xz9Z"
                                    title="Embedded Content" name="htmlComp-iframe"  scrolling="yes"
                                    data-src src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTi25tIqpbIP2R9XIIZUnT62HNhWgIvnE_Wki6Glk75lGFFKxxAsU_8RIRrOuYFdBYgLlQSzpPVh0FW/pubhtml?widget=true&amp;headers=false"></iframe>
                            <!--table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">編號</th>
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>
                        </div-->
                            <!-- Call to action-->
                            <div class="container px-5 my-5">
                                <div class="row gx-5 justify-content-center">
                                    <div class="col-lg-8 col-xl-6">
                                        <div class="text-center">
                                            <h2 class="fw-bolder">From our blog</h2>
                                            <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>

            </div>
            <!-- Blog preview section-->

        </div>
    </main>
    @include('layouts.footer')
    <script>
        $(function(){
            var $li = $('ul.tab-title li');
            $($li. eq(0) .addClass('active').find('a').attr('href')).siblings('.tab-inner').hide();

            $li.click(function(){
                $($(this).find('a'). attr ('href')).show().siblings ('.tab-inner').hide();
                $(this).addClass('active'). siblings ('.active').removeClass('active');
            });
        });
    </script>
@endsection
