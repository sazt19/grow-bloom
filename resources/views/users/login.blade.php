@extends('layouts.app')

@section('content')

<div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-semibold mb-6">{{ __('user.login') }}</h2>

    @if(session('error'))
        <p class="text-red-600 mb-4">{{ session('error') }}</p>
    @endif

    @if($errors->any())
        <ul class="text-red-600 mb-4">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.authenticate') }}" method="POST" class="flex flex-col gap-4">
        @csrf

        <div>
            <label class="block font-medium mb-1">{{ __('user.email') }}</label>
            <input type="email" name="email" value="{{ old('email') }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">{{ __('user.password') }}</label>
            <input type="password" name="password"
                class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit"
            class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
            {{ __('user.login') }}
        </button>

    </form>

    <p class="text-sm text-gray-500 mt-4">
        {{ __('user.no_account') }}
        <a href="{{ route('users.register') }}" class="text-green-700 hover:underline">
            {{ __('user.register') }}
        </a>
    </p>
</div>

@endsection