@extends('layouts.app')

@section('hero')
<div class="hero">
    <h1> Welcome to PlantStore</h1>
    <p>Find the perfect plant for your home</p>
    <a href="{{ route('plant.create') }}" class="hero-btn">+ Add New Plant</a>
</div>
@endsection

@section('content')
    <h1>Our Plants</h1>

    <div class="cards-grid">
        @foreach($viewData['plants'] as $plant)
            <div class="card">
                <div class="card-body">
                    <h2>{{ $plant->getName() }}</h2>
                    <p> {{ $plant->getType() }}</p>
                    <p> {{ $plant->getCaution() }}</p>
                    <div class="card-price">${{ $plant->getPrice() }}</div>
                </div>
                <div class="card-actions">
                    <a href="{{ route('plant.show', $plant->getId()) }}" class="btn btn-light">View</a>
                    <form action="{{ route('plant.destroy', $plant->getId()) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-red">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection