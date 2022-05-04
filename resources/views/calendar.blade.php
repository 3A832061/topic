@extends('layouts.partials.type')
@section('title','行事曆')
@section('index.con')
    <main class="flex-shrink-0">
    @include('layouts.nav')
        <!-- Page Content-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <h3>行事曆</h3>
                <iframe src="https://calendar.google.com/calendar/embed?src=nplmeq6n7tjdov4ttr5fo5lajg%40group.calendar.google.com&ctz=Asia%2FTaipei" style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
                @if (Route::has('login'))
                    @auth
                <a href="https://calendar.google.com/calendar/u/0?cid=bnBsbWVxNm43dGpkb3Y0dHRyNWZvNWxhamdAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ">取得日曆</a>
                    @endauth
                @endif
            </div>
         </section>
    </main>
    @include('layouts.footer')
@endsection



