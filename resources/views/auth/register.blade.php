@extends('layouts.partials.type')
@section('title','管樂社')

@section('index.con')
    @include('layouts.nav')

<x-guest-layout>
<div style="width: 60%; margin: auto; padding-top: 30px;">
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="hidden" name="year" value="{{date('Y/m/d')}}" >

            <div>
                <x-jet-label for="name" value="{{ __('名字') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('信箱') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-input id="password" class="block mt-1 w-full" type="hidden" name="password" required autocomplete="new-password" value="12345678"/>
            </div>

            <div class="mt-4">
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="hidden" name="password_confirmation" required autocomplete="new-password"  value="12345678"/>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>
                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('新增') }}
                </x-jet-button>
            </div>
        </form>
</div>
</x-guest-layout>
    @include('layouts.footer')
@endsection
