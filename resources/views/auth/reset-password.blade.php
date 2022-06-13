@extends('layouts.partials.type')
@section('title','管樂社')

@section('index.con')
    @include('layouts.nav')

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action={{ route('password.update') }}>
            @csrf

            @if(auth()->user()->pos=="社長")
                @auth()
                    <h4>若是有社員忘記密碼，可以輸入其信箱來幫他修改密碼。</h4>
                    <br>
                    <x-jet-label for="email" value="{{ __('信箱') }}" />
                    <x-jet-input id="eamil" class="block mt-1 w-full" type="email" name="email" value="{{auth()->user()->email}}" required autocomplete="new-password" />
                    @endauth
            @else
                <div style="display: none;">
                    <h4>若是有社員忘記密碼，可以輸入其信箱來幫他修改密碼。</h4>
                    <br>
                    <x-jet-label for="email" value="{{ __('信箱') }}" />
                    <x-jet-input id="eamil" class="block mt-1 w-full" type="email" name="email" value="{{auth()->user()->email}}" required autocomplete="new-password" />
                </div>
            @endif

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('新密碼') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('確認新密碼') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('重設') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
@include('layouts.footer')
@endsection
