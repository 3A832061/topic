@extends('layouts.partials.type')
@section('title','諾曼本管樂社 - 活動紀錄')
@section('outfit.css')
    <style>
        body {
            font-family: Arial;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        img {
            vertical-align: middle;
        }

        /* Position the image container (needed to position the left and right arrows) */
        .container {
            position: relative;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Add a pointer when hovering over the thumbnail images */
        .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {

            font-size: 20px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Container for image text */
        .caption-container {
            text-align: center;
            background-color: #222;
            padding: 2px 16px;
            color: white;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Six columns side by side */
        .column {
            float: left;
            width: 16.66% !important;
            height:60px !important;
        }

        /* Add a transparency effect for thumnbail images */
        .demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }
        .mySlides
        {
            height:100% ;
            max-height: 600px !important;
            width: 100% ;
            max-width: 1200px;
            margin:auto !important;
        }
        .image
        {
            max-width: 100%;
            max-height: 600px;
            overflow: hidden;
            /*#75799缺少置中*/
        }
        .containermage
        {
            border-width:1px;
            border-style:solid;
            border-color:#ccc;
            padding: 1px;

        }
        .prev, .next
        {
            color:#252525;
        }
        .prev:hover, .next:hover
        {
            background:rgba(0,0,0,0);
        }
        a:hover
        {
            color:#aaa !important;
        }

        .btn:hover  /*#75799想靠右!&COLOR*/
        {
            opacity:1.0;
            border-width:1px !important;
            border-style:solid !important;
            border-color:cornflowerblue !important;
            background:#CCC !important;
            color: #031f50 !important;
            transition: opacity .8s ease-in-out;
        }
        .mySlides{
            text-align:center !important;
            background-color:#ccc;

        }
        .mySlides:hover .show
        {
            display:block !important;
        }
        .show
        {
            display:none;
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
                            @if($type!='寒訓或暑訓')
                            <h1 >活動紀錄
                                @if( auth()->check())
                                    @if(auth()->user()->pos!='社員')
                                        <a class="btn btn-success " href="{{route('active.create')}}">新增</a>
                                    @endif
                                @endif
                            </h1>
                            @else
                                <h1 >寒/暑訓紀錄
                                    @if( auth()->check())
                                        @if(auth()->user()->pos!='社員')
                                            <a class="btn btn-success " href="{{route('active.create')}}">新增</a>
                                        @endif
                                    @endif
                                </h1>
                            @endif
                        </div>
                    </div>
                </div>

                <p>

                <div class="container" style="">
                    <!-- Full-width images with number text -->
                    <div class="containermage">
                        <?php $x=0; $sum=0; foreach($actives as $active) {$sum+=1;}?>
                    @foreach($actives as $active)
                    <div class="mySlides">
                       <div class="numbertext"> <?php $x+=1; echo $x."/".$sum."｜"; ?>{{$active->content}}
                                    @if ( auth()->check())
                                        @if(auth()->user()->pos!='社員')
                                            <a class="btn btn-primary flex-shrink-0" href="{{route('active.edit',$active->id)}}">修改</a>
                                           <form action="{{ route('active.destroy',$active->id) }}" method="POST" style="display: inline" onsubmit="javascript:return doubleCheck();">
                                               @method('DELETE')
                                               @csrf
                                               <button style="display: inline;" class="btn  btn-danger" type="submit" >刪除</button>
                                           </form>
                                        @endif
                                    @endif
                        </div>
                        <img  class="image" src={{asset("images/actives/".$active->url)}}>
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    <!-- 以上，左右切換+張數-->
                    @endforeach
                    </div>
                    <p>
                    <div class="row case">
                        <div class="column">


                        </div>
                    </div>

                </div>

                </div>

        </section>
    </main>

    <script>

        function doubleCheck(){
            var msg = "您真的確定要刪除嗎？\n\n請確認！";
            if (confirm(msg)==true){
                return true;
                alert('刪除成功');
            }
            else{
                return false;
            }
        }

        let slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("demo");
            let captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
        }
    </script>

    @include('layouts.footer')
@endsection


