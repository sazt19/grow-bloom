@extends('layouts.app')

@section('title', 'Plant Creation')

@section('content')

<h1>Create Plant</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('plants.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="type">Type:</label>
    <input type="text" id="type" name="type" required><br><br>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" required><br><br>

    <label for="caution">Caution:</label>
    <input type="text" id="caution" name="caution" required><br><br>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required><br><br>

    <label for="image">Image:</label>
    <input type="text" id="image" name="image" required><br><br>

    <button type="submit">Create</button>
</form>

<br>
<a href="{{ route('home') }}">Back to home</a>
@endsection