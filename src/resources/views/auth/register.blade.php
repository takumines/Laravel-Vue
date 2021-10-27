<x-guest-layout>
    <x-slot name="title">
        新規登録
    </x-slot>
    <div id="app">
        <register
            csrf-token="{{ csrf_token() }}"
            email="{{ old('email') }}"
            password="{{ old('password') }}"
            confirm-password="{{ old('confirm_password') }}"
        ></register>
    </div>
</x-guest-layout>
