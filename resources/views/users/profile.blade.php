@extends('layouts.app')

@section('content')

<div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-semibold mb-6">{{ __('user.profile') }}</h2>

    <div class="flex flex-col gap-3">
        <p><span class="font-medium">{{ __('user.name') }}:</span>
            {{ $viewData['user']->getName() }}</p>

        <p><span class="font-medium">{{ __('user.email') }}:</span>
            {{ $viewData['user']->getEmail() }}</p>

        <p><span class="font-medium">{{ __('user.phone') }}:</span>
            {{ $viewData['user']->getPhone() }}</p>

        <p><span class="font-medium">{{ __('user.address') }}:</span>
            {{ $viewData['user']->getAddress() }}</p>
    </div>

    <form action="{{ route('users.logout') }}" method="POST" class="mt-6">
        @csrf
        <button type="submit"
            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            {{ __('user.logout') }}
        </button>
    </form>
</div>

@endsection