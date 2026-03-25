@extends('layouts.admin')

@section('content')
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
        <form action="{{ route('admin.plant.update', $viewData['plant']->getId()) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name', $viewData['plant']->getName()) }}">
            </div>
            <div class="form-group">
                <label>Type</label>
                <input type="text" name="type" value="{{ old('type', $viewData['plant']->getType()) }}">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" value="{{ old('price', $viewData['plant']->getPrice()) }}">
            </div>
            <div class="form-group">
                <label>Caution</label>
                <input type="text" name="caution" value="{{ old('caution', $viewData['plant']->getCaution()) }}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="3">{{ old('description', $viewData['plant']->getDescription()) }}</textarea>
            </div>
            <div class="form-group">
                <label>Image URL</label>
                <input type="text" name="image" value="{{ old('image', $viewData['plant']->getImage()) }}">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.plant.index') }}" class="btn btn-primary">Cancel</a>
        </form>
    </div>
@endsection