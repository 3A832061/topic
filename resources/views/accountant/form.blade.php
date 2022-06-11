@extends('layouts.partials.type')
@section('form.css')
    <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

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

        * {
            box-sizing: border-box;
        }

        .content {
            margin:auto;
            width: 60%;
            background-color: #f2f2f2;
            padding: 20px;
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

    <h1 style="padding-top: 5%;text-align: center;">填寫收支</h1>
    <p>
    <main class="content" >
        <div class="wa">
        <iframe name="hidden_iframe" style="display: none;"></iframe>
        <form style="padding-bottom: 5%;" onsubmit="javascript:return success();" action="https://script.google.com/macros/s/AKfycbx7nsrV_jO3E8RNBS1_s-5hsvVj_dRBRwJfx1EEdmkgNSw7obF8Y1NtOeZUAyc332LE/exec" target="hidden_iframe" method="POST" role="form" >
            @csrf
            <input type="hidden" name="method" value="write">
            <input type="hidden" name="user" value={{auth()->user()->name}}>

            <div class="form-group">
                    <label for="year" class="inline">學期：*</label>
                    <input name="year" class="form-control-itemname" placeholder="例如：1101、1102、1111...等" required>
            </div>

            <div class="form-group">
                    <label for="date" class="inline">日期：*</label>
                    <input name="date" class="form-control-itemname" type="date" required>
            </div>


            <div class="form-group">
                    <label for="type" class="inline">類別：*</label>
                    <select id="type" name="type" class="form-control-itemname"  onchange="aaa()">
                        <option value="收入" selected>收入</option>
                        <option value="支出">支出</option>
                    </select>
            </div>

            <div id="revenue">
                <div class="form-group">
                    <label for="content" class="inline">來源：*</label>
                    <select id="content" class="form-control-itemname" name="content" onchange="bbb()">
                        <option value="學校補助" selected>學校補助</option>
                        <option value="社員社費">社員社費</option>
                        <option value="比賽獎金">比賽獎金</option>
                    </select>
                </div>
            </div>

            <div id="expenditure" style="display: none;">
                <div class="form-group">
                        <label for="content" class="inline">用途：*</label>
                        <select id="content" class="form-control-itemname" name="content">
                            <option value="行政支出" selected>行政支出</option>
                            <option value="活動支出">活動支出</option>
                            <option value="老師薪資">老師薪資</option>
                            <option value="印譜費用">印譜費用</option>
                        </select>
                </div>
            </div>



            <div class="form-group">
                <label for="price" class="inline">單價：*</label>
                <input name="price" type="number" class="form-control-itemname" step="0.5"  required>
            </div>

            <div id="b">
                <div class="form-group">
                    <label for="quantity" class="inline">數量：*</label>
                    <input name="quantity" type="number" class="form-control-itemname" required>
                </div>
            </div>

            <div class="form-group">
                <label for="remark" class="inline" style=" vertical-align: middle;">備註：</label>
                <textarea name="remark" class="form-control-itemname" rows="3"></textarea>
            </div>
            <div id="a" style="display: none;">
                <label for="price" class="inline" style="padding-bottom: 20px;">尚未繳交：</label>
                <label>
                @if(count($users)!=0)
                    @foreach($users as $user)
                        {{$user->name}}、
                    @endforeach
                @endif
                </label>
                <p style="text-align: center;">*填寫完後，記得到社員清單那裏更新誰有繳交社費*</p>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary" style="float: right;">提交</button>
            </div>

        </form>
        </div>
    </main>
    @include('layouts.footer')
    <script>
        function success(){
            window.alert("提交成功");
            return true;
        }

        function aaa(){
            if(document.getElementById('type').value=='收入'){
                document.getElementById('revenue').style.display='initial';
                document.getElementById('expenditure').style.display='none';
            }
            else{

                document.getElementById('revenue').style.display="none";
                document.getElementById('expenditure').style.display='initial';
            }
        }

        function bbb(){
            if(document.getElementById('content').value=='社員社費'){
                document.getElementById('a').style.display='initial';
            }
            else{
                document.getElementById('a').style.display="none";
            }
        }
    </script>
@endsection
