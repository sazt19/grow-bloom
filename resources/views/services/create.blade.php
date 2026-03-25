@extends('layouts.app')

@section('content')

<div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto">
    <h2 class="text-2xl font-semibold mb-6">{{ __('service.create') }}</h2>

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

    <form action="{{ route('services.store') }}" method="POST" class="flex flex-col gap-4">
        @csrf

        <div>
            <label class="block font-medium mb-1">{{ __('service.employee') }}</label>
            <input type="text" name="employee" value="{{ old('employee') }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">{{ __('service.description') }}</label>
            <input type="text" name="description" value="{{ old('description') }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">{{ __('service.price') }}</label>
            <input type="number" name="price" value="{{ old('price') }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium mb-1">{{ __('service.duration') }}</label>
            <input type="text" name="duration" value="{{ old('duration') }}"
                class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit"
            class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
            {{ __('service.save') }}
        </button>

    </form>
</div>

@endsection