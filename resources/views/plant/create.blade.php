@extends('layouts.app')

@section('content')
    <h1>{{ $viewData['title'] }}</h1>

    @if($errors->any())
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">
        <form action="{{ route('plant.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label>Type</label>
                <input type="text" name="type" value="{{ old('type') }}">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <label>Caution</label>
                <input type="text" name="caution" value="{{ old('caution') }}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label>Image URL</label>
                <input type="text" name="image" value="{{ old('image') }}">
            </div>
            <button type="submit" class="btn btn-green">Save Plant</button>
            <a href="{{ route('plant.index') }}" class="btn btn-light">Cancel</a>
        </form>
    </div>
@endsection