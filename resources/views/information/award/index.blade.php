@extends('layouts.partials.type')
@section('title','管樂社')
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
            color: #f2f2f2;
            font-size: 12px;
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
        .image
        {
            width:600px;
            height:400px;
        }


    </style>
@endsection
@section('index.con')
    <main class="flex-shrink-0">
        @include('layouts.nav')
        <section class="py-1">
            <div class="container px-5 my-4">
                <div class="container">

                    <!-- Full-width images with number text -->
                    <div class="mySlides">
                        <div class="numbertext">1 / 6</div>
                        <img src="" class="image">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">2 / 6</div>
                        <img src="" class="image">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">3 / 6</div>
                        <img src="" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">4 / 6</div>
                        <img src="" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">5 / 6</div>
                        <img src="" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">6 / 6</div>
                        <img src="" style="width:100%">
                    </div>

                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    <!-- Image text -->
                    <div class="caption-container">
                        <p id="caption"></p>
                    </div>

                    <!-- Thumbnail images -->
                    <div class="row case">
                        <div class="column">
                            <img class="demo cursor" src="https://images.plurk.com/17bgyd5rWqGjoy64G3r2bv.png" style="width:40px; height:60px;" onclick="currentSlide(1)" alt="The Woods">
                        </div>
                        <div class="column">
                            <img class="demo cursor" src="https://images.plurk.com/1sJgamDAxSJOLaEBHLPwU7.png" style="width:40px; height:60px;" onclick="currentSlide(2)" alt="The Woods">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
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
