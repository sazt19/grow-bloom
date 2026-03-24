@extends('layouts.app')

@section('title', 'Plant List')

@section('content')

<h1>Plant List</h1>

@if ($plants->isEmpty())
    <p>No plants found.</p>
@else
    <ul>
        @foreach ($plants as $plant)
            <li>
            <a href="{{ route('plants.show', $plant->id) }}">
                ID: {{ $plant->getId() }}
            </a>
            - {{ $plant->getName() }}
         </li>
        @endforeach
    </ul>
@endif
@endsection