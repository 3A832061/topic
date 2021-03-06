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
            width: 70%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 5%;
        }
        .inline{
            text-align: center;
            padding: 12px 12px 12px 0;
            width: 20%;

            display: inline-block;
        }
        .form-group
        {
            width: 100%;
            float: left;
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
        .content {
            margin:auto;
            width: 60%;
            background-color: #f2f2f2;
            margin-bottom: 5%;
            padding: 30px;
            border-radius: 20px 20px 20px 20px;
        }

        @media screen and (max-width: 742px) {
            .form-control-itemname, .inline {
                text-align: left;
                width: 100%;
                margin-top: 0;
            }
        }

    </style>
@endsection
@section('index.con')
    @include('layouts.nav')
        <h1 style="margin-top: 5%;text-align: center;">????????????</h1>
<br>
        <div class="content">
            <form action="{{route('sheet.store')}}" method="POST" role="form" onsubmit="success()">
                @csrf
                <h6 style="font-weight: bolder; color:red;">*=??????</h6><div class='form-group'>
                    <label for='name' class='inline'>????????????*???</label>
                    <input id='name' name='name' class='form-control-itemname'  placeholder='???????????????????????????' value='' required>
                </div>
                <div class='form-group'>
                    <label for='type' class='inline'>???????????????</label>
                    <select id='type' name='type' class='form-control-itemname'>
                        <option value='?????????' >?????????</option>
                        <option value='?????????' >?????????</option>
                        <option value="?????????" >?????????</option>
                        <option value="?????????" >?????????</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="zhname" class="inline">???????????????</label>
                    <input id="zhname" name="zhname" class="form-control-itemname" placeholder="???????????????????????????????????????" value="" >
                </div>
                <div class="form-group">
                    <label for="composer" class="inline">?????????*???</label>
                    <input name="composer" class="form-control-itemname" placeholder="????????????????????????" value="" id="page" required>
                </div>
                <div class="form-group">
                    <label for="arranger" class="inline">????????????</label>
                    <input name="arranger" class="form-control-itemname" placeholder="????????????????????????" value="" id="numpage">
                </div>
                <div class="form-group">
                    <label for="lost" class="inline">?????????????????????</label>
                    <textarea name="lost" class="form-control-itemname" placeholder="????????????????????????????????????????????????" value="" id="quan"></textarea>
                </div>
                <div class="form-group">
                    <label for="saveform" class="inline">???????????????</label>
                    <select id="saveform" name="saveform" class="form-control-itemname">
                        <option value="?????????" >????????????</option>
                        <option value="?????????" >????????????</option>
                        <option value="?????????/?????????" >?????????+?????????</option>
                    </select>
                </div>
                <!--????????????????????????-->
                <div class="form-group">
                    <label for="authorize" class="inline">???????????????</label>

                    <select id="authorize" name="authorize" class="form-control-itemname">
                        <option value="?????????" >?????????</option>
                        <option value="???????????????">???????????????</option>
                        <option value="??????????????????">??????????????????</option>
                        <option value="???????????????">???????????????</option>
                        <option value="?????????">?????????</option>
                    </select>
                    <button id="show" class="inline btn btn-outline-primary flex-lg-shrink-1" style="margin-left: 5%; border:0px; font-weight: bolder; ">
                        ??????????????????
                    </button>
                    <dialog id="infoModal">
                        <p> <h3>??????????????????</h3><p>
                            ??????????????????????????????<p>
                            1????????????<br>
                            ?????? ??????????????????John Mackey<br>
                            ????????????????????????????????????????????????????????????????????????????????????<br>
                            ????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br>
                            ???????????????????????????????????????????????????????????????????????????????????????????????????<br>
                            ?????????????????????????????????????????????????????????????????????????<p>
                            2??????????????????<br>
                            ???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br>
                            ???????????????????????????????????????????????????????????????????<p>
                            3?????????????????????<br>
                            ???????????????????????????????????????????????????????????????????????????????????????<br>
                            ???????????????????<p>
                            4??????????????????<br>
                            ??????????????????????<p>
                            ???????????????????????????????????????????????????????????????<br>
                            ????????????????????????????????????????????????????????????????????????<br>
                            ????????????<br>
                            ????????????????????????????????????????????????????????????????????????????????????????????????????<br>
                            ?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????500??????????????????????????????????????????<b>??????????????????</b><br>
                            ??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????<br>
                            ??????????????????????????????????????????????????????????????????-
                        </p>
                        <a id="close"  class="inline btn btn-outline-primary flex-lg-shrink-1">??????</a>
                    </dialog>
                </div>
                <div class="form-group">
                    <label for="year" class="inline">?????????</label>
                    <input name="year" class="form-control-itemname" type='year' placeholder="???????????????????????????" id="remark">
                </div>
                <div class="form-group">
                    <label for="price" class="inline">???????????????</label>
                    <input name="price" class="form-control-itemname" placeholder="???????????????????????????" id="remark">
                </div>
                <div class="form-group">
                    <label for="change1" class="inline">???????????????</label>
                    <select id="change1" name="change1" class="form-control-itemname">
                        <option value=0 >????????????</option>
                        <option value=1 selected>????????????</option>
                    </select>
                    <p style="margin-left: 5%;">????????????????????????????????????</p>
                </div>
                <div class="form-group">
                    <label for="check1" class="inline">10???????????????</label>
                    <select id="check1" name="check1" class="form-control-itemname">
                        <option value=1 >???</option>
                        <option value=0 selected>???</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="remark" class="inline">?????????</label>
                    <input name="remark" class="form-control-itemname" placeholder="????????????????????????????????????????????????????????????"id="remark">
                </div>
                <div class="form-group">
                    <label for="pin" class="inline"></label>
                    <input name="pin" class="form-control-itemname" placeholder="" value="{{auth()->user()->name}}" id="pin"
                           style="display:none;">
                </div>
                <div class="text-right">
                    <button style="float: right;" type="submit" class="btn btn-primary" >??????</button>
                </div>

            </form>
        </div>

    @include('layouts.footer')
    <script>
        function success(){
            window.alert("????????????!");
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
