@extends('layouts.app')

@section('content')

<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">{{ __('service.list') }}</h2>
        <a href="{{ route('services.create') }}"
            class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
            {{ __('service.create') }}
        </a>
    </div>

    @if(session('success'))
        <p class="text-green-600 mb-4">{{ session('success') }}</p>
    @endif

    @foreach($viewData['services'] as $service)
        <div class="border rounded p-4 mb-3 flex justify-between items-center">
            <div>
                <p class="font-medium">{{ $service->getEmployee() }}</p>
                <p class="text-gray-500 text-sm">{{ $service->getDescription() }}</p>
            </div>
            <a href="{{ route('services.show', $service->getId()) }}"
                class="text-green-700 hover:underline text-sm">
                {{ __('service.show') }}
            </a>
        </div>
    @endforeach
</div>

@endsection