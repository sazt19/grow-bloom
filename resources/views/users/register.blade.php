@extends('layouts.app')

@section('content')

<div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-semibold mb-6">{{ __('user.register') }}</h2>

    @if(session('success'))
        <p class="text-green-600 mb-4">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul class="text-red-600 mb-4">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.store') }}" method="POST" class="flex flex-col gap-4">
        @csrf

        <div>
            <label class="block font-medium mb-1">{{ __('user.name') }}</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">{{ __('user.email') }}</label>
            <input type="email" name="email" value="{{ old('email') }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">{{ __('user.phone') }}</label>
            <input type="text" name="phone" value="{{ old('phone') }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">{{ __('user.address') }}</label>
            <input type="text" name="address" value="{{ old('address') }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">{{ __('user.password') }}</label>
            <input type="password" name="password"
                class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit"
            class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
            {{ __('user.register') }}
        </button>

    </form>

    <p class="text-sm text-gray-500 mt-4">
        {{ __('user.already_account') }}
        <a href="{{ route('users.login') }}" class="text-green-700 hover:underline">
            {{ __('user.login') }}
        </a>
    </p>
</div>

@endsection