@extends('layouts.app')

@section('content')

<div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-semibold mb-6">{{ __('service.show') }}</h2>

    <div class="flex flex-col gap-3">
        <p><span class="font-medium">{{ __('service.employee') }}:</span>
            {{ $viewData['service']->getEmployee() }}</p>

        <p><span class="font-medium">{{ __('service.description') }}:</span>
            {{ $viewData['service']->getDescription() }}</p>

        <p><span class="font-medium">{{ __('service.price') }}:</span>
            {{ $viewData['service']->getPrice() }}</p>

        <p><span class="font-medium">{{ __('service.duration') }}:</span>
            {{ $viewData['service']->getDuration() }}</p>
    </div>

    <form action="{{ route('services.destroy', $viewData['service']->getId()) }}"
        method="POST" class="mt-6">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            {{ __('service.delete') }}
        </button>
    </form>

    <a href="{{ route('services.index') }}"
        class="text-green-700 hover:underline text-sm mt-4 inline-block">
        ← {{ __('service.list') }}
    </a>
</div>

@endsection