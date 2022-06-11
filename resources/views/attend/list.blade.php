@extends('layouts.partials.type')
@section('title','管樂社')
@section('index.con')
<main class="flex-shrink-0">
    @include('layouts.nav')
    <div style="height: 100VH;width: 100%;padding: 0 5%;">
    <iframe width="100%" height="90%" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQl28sjUUWdVagOTa6BW6nDiZn1cDKLG-RXWA9B-a2bGT4iHuNv_I8_XBMeRI7jTJReZ_Xo3BXKpYUi/pubhtml?widget=true&amp;headers=false"></iframe>
    </div>
</main>
@include('layouts.footer')
@endsection
