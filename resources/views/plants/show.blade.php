@extends('layouts.app')

@section('title', 'Plant details')

@section('content')

<h1>Plant details</h1>

<p>Name: {{ $plant->getName() }}</p>
<p>Type: {{ $plant->getType() }}</p>
<p>Price: {{ $plant->getPrice() }}</p>
<p>Caution: {{ $plant->getCaution() }}</p>
<p>Description: {{ $plant->getDescription() }}</p>
<p>Image: {{ $plant->getImage() }}</p>

<br>
<a href="{{ route('plants.index') }}">Back to Plant List</a>
<br><br>

<form action="{{ route('plants.destroy', $plant->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>

@endsection
