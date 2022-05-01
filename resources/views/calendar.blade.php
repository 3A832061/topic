@extends('layouts.partials.type')
@section('title','行事曆')

<main class="flex-shrink-0">
@include('layouts.nav')
    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <h3 align="center">行事曆</h3>
            <iframe src="https://calendar.google.com/calendar/embed?src=nplmeq6n7tjdov4ttr5fo5lajg%40group.calendar.google.com&ctz=Asia%2FTaipei" style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
        </div>
</main>
<!-- Footer-->
<footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2022</div></div>
            <div class="col-auto">
                <a class="link-light small" href="#!">Privacy</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Terms</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Contact</a>
            </div>
        </div>
    </div>
</footer>


