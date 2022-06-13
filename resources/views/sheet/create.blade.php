@extends('layouts.partials.type')
@section('form.css')
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">
    <style>
        .row
        {padding-left:50px !important;}
        .mt-4
        {padding-left: 35px;}
        /*--*/
        .form-control-itemname
        {
            display: inline;
            width: 60%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group
        {
            margin-bottom: 15px !important;
        }
        #layoutSidenav_content
        {
            margin-left:200px !important;
            margin-bottom:100px !important;
        }
        dialog{
            border: none;
            box-shadow: 0 2px 6px #ccc;
            border-radius: 10px;
        }
        dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.1);
        }
        .inline.btn.btn-outline-primary.flex-lg-shrink-1:hover
        {
            color:blue;
            text-decoration:underline;
            border:0px;
            background-color:transparent;
        }


    </style>
@endsection
@section('index.con')
    @include('layouts.nav')
    <!-- 公告-->
    <main class="flex-shrink-0">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4" id="customerz1">新增樂譜</h1>
                    <!--a class="btn btn-success flex-shrink-0" href=>查看審核狀態</a-->
                </div>
                <!-- /.row -->
                <p>
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{route('sheet.store')}}" method="POST" role="form">
                            @csrf
                            <h6 style="font-weight: bolder; color:red;">*=必填</h6><div class='form-group'>
                                <label for='name' class='inline'>曲目名稱*：</label>
                                <input id='name' name='name'  class='form-control-itemname' placeholder='請輸入曲目原文名稱' value='' required>
                            </div>
                            <div class='form-group'>
                                <label for='type' class='inline'>曲目類型：</label>
                                <select id='type' name='type' class='form-control'>
                                    <option value='外文譜' >外文譜</option>
                                    <option value='日文譜' >日文譜</option>
                                    <option value="中文譜" >中文譜</option>
                                    <option value="重奏譜" >重奏譜</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="zhname" class="inline">中文譯名：</label>
                                <input id="zhname" name="zhname" class="form-control-itemname" placeholder="若為外文曲目可輸入中譯名稱" value="" >
                            </div>
                            <div class="form-group">
                                <label for="composer" class="inline">作曲者*：</label>
                                <input name="composer" class="form-control-itemname" placeholder="請輸入作曲者姓名" value="" id="page" required>
                            </div>
                            <div class="form-group">
                                <label for="arranger" class="inline">編曲者：</label>
                                <input name="arranger" class="form-control-itemname" placeholder="請輸入編曲者姓名" value="" id="numpage">
                            </div>
                            <div class="form-group">
                                <label for="lost" class="inline">存譜缺少聲部：</label>
                                <textarea name="lost" class="form-control-itemname" placeholder="若存譜有聲部缺少請在此處詳細註明" value="" id="quan"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="saveform" class="inline">存放形式：</label>
                                <select id="saveform" name="saveform" class="form-control">
                                    <option value="電子譜" >純電子譜</option>
                                    <option value="紙本譜" >純紙本譜</option>
                                    <option value="電子譜/紙本譜" >電子譜+紙本譜</option>
                                </select>
                            </div>
                            <!--譜的授權方式補充-->
                            <div class="form-group">
                                <label for="authorize" class="inline">授權模式：
                                </label>
                                <button id="show" class="inline btn btn-outline-primary flex-lg-shrink-1" style="border:0px; font-weight: bolder; ">
                                    授權模式說明
                                </button>
                                <dialog id="infoModal">
                                    <p> <h3>譜的授權方式</h3><p>
                                        關於樂譜的授權的種類<p>
                                        1、租賃譜<br>
                                        例如 八木澤教司、John Mackey<br>
                                        只租賃，不斷賣，會公告在網站上哪首作品會在哪演出或比賽。<br>
                                        這種會與代理商或作曲家直接簽約付款，「授權書」上會明確表示哪個團在哪個時間區間可以演出或是比賽次數，通常給電子譜<br>
                                        不明究理的學生，換到或演出影片放在網路上極容易被抓，馬上有證據提告<br>
                                        👉日本譜通常抓到一次罰三倍（通常租賃譜一份破萬）<p>
                                        2、授權書模式<br>
                                        買了譜不論拿到電子檔或紙本，重點是那張授權書上會記錄這是出版第幾號，授權給哪團，無限演出次數。台灣商業音樂改編都是這種模式，比如：卡儂五月天或新加坡五月天、賦格小幸運等。<br>
                                        👉認權授權書給哪個團，所以要演的樂團要自己買<p>
                                        3、授權指揮模式<br>
                                        台灣管樂發展聯盟，授權指揮就是只要是指揮本人指揮演出都可以<br>
                                        👉認指揮本人<p>
                                        4、原版譜模式<br>
                                        👉認譜的擁有者<p>
                                        —————————————————————<br>
                                        勤益管樂自創社開始，樂譜絕大部分都來自余文凱老師<br>
                                        在此告知<br>
                                        👉不論是鐠務、其他幹部或任何社員，換譜曲一定要經過余文凱老師的同意<br>
                                        👉以及社團裡有許多集資福利譜，也就是提倡使用者付費觀念，文凱老師花錢買原版譜（上述的原版譜模式），學生以500塊的價錢購買演出權，那些譜是<b>絕對不能換的</b><br>
                                        👉甚至未來若文凱老師離開，當屆的幹部必須要跟文凱討論勤益這些年從老師那拿到的譜如何處置<br>
                                        ——————————————————————-
                                    </p>
                                    <a id="close"  class="inline btn btn-outline-primary flex-lg-shrink-1">關閉</a>
                                </dialog>
                                <select id="authorize" name="authorize" class="form-control">
                                    <option value="租賃譜" >租賃譜</option>
                                    <option value="授權書模式">授權書模式</option>
                                    <option value="授權指揮模式">授權指揮模式</option>
                                    <option value="原版譜模式">原版譜模式</option>
                                    <option value="福利譜">福利譜</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="year" class="inline">年份：</label>
                                <input name="year" class="form-control-itemname" type='year' placeholder="請填寫樂譜發行年份" value="" id="remark">
                            </div>
                            <div class="form-group">
                                <label for="price" class="inline">購譜價格：</label>
                                <input name="price" class="form-control-itemname" placeholder="請填寫樂譜購入價格" value="" id="remark">
                            </div>
                            <div class="form-group">
                                <label for="change1" class="inline">能否換譜（※若不確定則默認不可換譜）：</label>
                                <select id="change1" name="change" class="form-control">
                                    <option value="0" >可以換譜</option>
                                    <option value="1" selected>不可換譜</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="check1" class="inline">10年間已演奏</label>
                                <select id="check1" name="check" class="form-control">
                                    <option value="1" >是</option>
                                    <option value="0" selected>否</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="remark" class="inline">備註：</label>
                                <input name="remark" class="form-control-itemname" placeholder="如果有其他備註或重奏聲部類別請在此處填寫" value="" id="remark">
                            </div>
                            <div class="form-group">
                                <label for="pin" class="inline"></label>
                                <input name="pin" class="form-control-itemname" placeholder="" value="{{auth()->user()->pos}}" id="pin"
                                       style="display:none;">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" onsubmit="success()">儲存</button>
                            </div>

                        </form>
                    </div>
                </div>
            </main>
        </div>
    </main>
    @include('layouts.footer')
    <script>
        function success(){
            window.alert("成功新增!");
            document.getElementById('index').click();
        }

        let btn=document.querySelector("#show");
        let infoModal=document.querySelector("#infoModal");
        let close=document.querySelector("#close");
        btn.addEventListener("click", function(){
            infoModal.showModal();
        })
        close.addEventListener("click", function(){
            infoModal.close();
        })
    </script>
@endsection
