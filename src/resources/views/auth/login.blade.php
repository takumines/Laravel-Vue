<x-guest-layout>
    <x-slot name="title">
        ログイン
    </x-slot>
    <div id="app">
        <login
            csrf-token="{{ csrf_token() }}"
            email="{{ old('email') }}"
            password="{{ old('password') }}"
        ></login>
    </div>
</x-guest-layout>
