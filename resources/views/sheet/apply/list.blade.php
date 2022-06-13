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
    .afu
    {
        border-bottom: #2a2a2a 2px solid;
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
                            <h1 class="fw-bolder">樂譜缺頁申請一覽</h1>
                            @if ( auth()->check())
                                    <a class="btn btn-outline-danger btn-lg px-4" href={{route('sheetrequest.create')}} >缺頁申請</a>
                                @endif
                            <p>
                        </div>
                    </div>
                </div>
                <div class="c">
                    <div class="row gx- justify-content-center">
                    </div>
                    <div class="card-body">
                        <p></p>
                        <table class="order-table table">
                            <thead class="thead-dark">
                            <tr class="afu">
                                <th scope="col">申請日期</th>
                                <th scope="col">申請人</th>
                                <th scope="col">申請曲目</th>
                                <th scope="col">聲部</th>
                                <th scope="col">分部</th>
                                <th scope="col">頁數</th>
                                <th scope="col">份數</th>
                                <th scope="col">申請狀態</th>
                                <th scope="col">備註</th>
                                @if((auth()->user()->pos=='社長')||(auth()->user()->pos=='譜務'))<th scope="col"></th>@endif
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $x=0;

                            foreach($sheets as $a){
                            echo "<tr>";
                            echo "<td scope='row'>".$a->day;
                            echo "<td>".$a->mem_name."</td>";
                            echo "<td>".$a->name."</td>";
                            echo "<td>".$a->part."</td>";
                            echo "<td>".$a->page."</td>";
                            echo "<td>".$a->num_page."</td>";
                            echo "<td>".$a->quan."</td>";
                            if(($a->state)=="1"){
                                    echo "<td style='color:#088a1e; font-weight: bolder; '>申請中</td>";
                                }
                            else
                                {
                                    echo "<td style='color:#b02a37; font-weight: bolder; '>已發放</td>";
                                }
                            echo "<td>".$a->remark."</td>";

                            ?>
                                @if((auth()->user()->pos=='社長')||(auth()->user()->pos=='譜務'))
                                    <td style="width:15%"><a class='btn btn-outline-dark flex-shrink-0' href='{{route('sheetrequest.edit',$a->id)}}' style=' white-space:nowrap;'>確認完成</a>
                                                <form action='{{ route('sheetrequest.destroy',$a->id)}}' method='POST'
                                                      style='display: inline; white-space:nowrap;' onSubmit="return CheckForm();">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button  class='btn btn-outline-danger flex-shrink-0' type='submit' >清除申請</button>
                                                </form>
                                    </td>
                                @endif
                                    <?php

                                    echo "</tr>";
                                    }

                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script src="{{asset('js/mana.datatables-simple-demo.js')}}"></script>
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
            if(confirm("確定要刪除嗎?")==true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    </script>
    <!-- Latest compiled and minified CSS -->

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
    <!-- Latest compiled and minified Locales -->
    <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/locale/bootstrap-table-zh-CN.min.js"></script>
    @include('layouts.footer')
@endsection
