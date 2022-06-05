@extends('layouts.partials.type')
@section('title','管樂社')
<style>
    .col-lg-6
    {
      width:100%;
    }
    .img-fluid
    {
        text-align: right !important;
    }
    .col-lg-6.ass
    {
        text-align:center !important;
    }
     .col-lg-6
     {
         width:100%;

     }

    .img-fluid.rounded-3.mb-3
    {
        width:400px !important;
        height: 500px !important;
        background-color: #1e1e1e;
    }
    .btn.btn-outline-success.flex-shrink-0
    {
        color:#d7ad96 !important;
        border-color: #d7ad96 !important;
    }
    .btn.btn-outline-success.flex-shrink-0:hover
    {
        color:white !important;
        border-color: #d7ad96 !important;
        background-color: #d7ad96 !important;
    }

</style>
@section('index.con')
    <main class="flex-shrink-0">
        @include('layouts.nav')
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">指導老師</h1>
                    </div>
                </div>
            </div>
            <div class="row gx-5">

                <div class="col-12"></div>
                <section class="col-4">
                    <div>
                        <ul><?php
                                @foreach
                                <li><a href="

                      "></a></li>
                            
                            ?>
                        </ul>
                    </div>
                </section>
                <section class="col-5">
                            <div class="col-8">
                                <img class="img-fluid rounded-3" src="" alt="..." />
                            </div>
                </section>
                    <div class="col-4">
                        <p>....</p>
                    </div>



            </div>
        </div>
    </section>
</main>
@include('layouts.footer')
@endsection
