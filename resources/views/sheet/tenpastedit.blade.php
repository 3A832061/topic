@extends('layouts.partials.type')
@section('title','管樂社')
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">

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
                            <h1 class="fw-bolder">歷年演奏曲目新增</h1>
                            <p>
                        </div>
                    </div>
                </div>
                <div class="c">
                    <div class="row gx- justify-content-center">
                    </div>
                    <!--if ( auth()->check())
                        if((auth()->user()->pos=='社長')||(auth()->user()->pos=='譜務'))-->
                    <div class="card-body">
                        <center>曲目搜尋：<input type="search" class="light-table-filter form-group" data-table="order-table" placeholder="請輸入名稱(至少2字元)"></center>
                        <p></p>
                        <table class="order-table table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">編號</th>
                                <th scope="col">曲目名稱</th>
                                <th scope="col">中文譯名</th>
                                <th scope="col">作曲者</th>
                                <th scope="col">存譜缺少聲部</th>
                                <th scope="col">存放形式</th>
                                <th scope="col">授權方式</th>
                                <th scope="col">年份</th>
                                <th scope="col">能否換譜</th>
                                <th scope="col">10年間已演奏</th>
                                <th scope="col">備註</th>
                                <th scope="col">登錄者</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x=0;

                            foreach($sheets as $a){
                            echo "<tr>";
                            echo "<td>".$x+=1;
                            echo "<td>".$a->name."</td>";
                            echo "<td>".$a->zhname."</td>";
                            echo "<td>".$a->composer."</td>";
                            echo "<td>".$a->lost."</td>";
                            echo "<td>".$a->saveform."</td>";
                            echo "<td>".$a->authorize."</td>";
                            echo "<td>".$a->year."</td>";
                            echo "<td>";
                            if(($a->change1)==1)
                            {
                                echo "<font style='color:red; font-weight: bolder; text-align: center !important;'>✗";
                            }
                            else
                            {
                                echo "<font style='color:green; font-weight: bolder; text-align: center !important;'>✓";
                            }
                            echo"</td>";
                            echo "<td>";
                            if(($a->check1)==1)
                            {
                                echo "<font style='color:green; font-weight: bolder; text-align: center !important;'>✓";
                            }
                            else
                            {
                                echo "<font style='color:red; font-weight: bolder; text-align: center !important;'>✗";
                            }
                            echo"</td>";
                            echo "<td>".$a->remark."</td>";
                            echo "<td>".$a->pin."</td>";?>
                                    <td style="width:5%">
                                        <form action='{{ route('sheet.check',$a->id) }}' method='POST' style='display: inline; white-space:nowrap;' onSubmit="return CheckForm();">
                                            @method('POST')
                                            @csrf
                                            <button  class='btn btn-outline-danger flex-shrink-0' type='submit' >登錄</button>
                                        </form>
                                    </td>
                            <?php
                            echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                        <!--endif
                            endif-->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script>
        (function(document) {
            'use strict';

            // 建立 LightTableFilter
            var LightTableFilter = (function(Arr) {

                var _input;

                // 資料輸入事件處理函數
                function _onInputEvent(e) {
                    _input = e.target;
                    var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
                    Arr.forEach.call(tables, function(table) {
                        Arr.forEach.call(table.tBodies, function(tbody) {
                            Arr.forEach.call(tbody.rows, _filter);
                        });
                    });
                }

                // 資料篩選函數，顯示包含關鍵字的列，其餘隱藏
                function _filter(row) {
                    var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
                    row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
                }

                return {
                    // 初始化函數
                    init: function() {
                        var inputs = document.getElementsByClassName('light-table-filter');
                        Arr.forEach.call(inputs, function(input) {
                            input.oninput = _onInputEvent;
                        });
                    }
                };
            })(Array.prototype);

            // 網頁載入完成後，啟動 LightTableFilter
            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    LightTableFilter.init();
                }
            });

        })(document);
        function CheckForm()

        {
            if(confirm("確定登錄?")==true)
            {
                return true;

            }
            else
            {
                return false;
            }
        }
    </script>

    @include('layouts.footer')
@endsection
