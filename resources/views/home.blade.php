@extends('layouts.app')

@section('title', 'Home')

@section('styles')
<style>
    body {
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Arial, sans-serif;
    }

    .container {
        text-align: center;
    }

    .btn {
        display: inline-block;
        padding: 12px 20px;
        margin: 10px;
        background-color: #2c7a7b;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        transition: 0.2s ease;
    }

    .btn:hover {
        background-color: #1c4a4a;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h1>Grow & Bloom</h1>

    <a href="{{ route('plants.create') }}" class="btn">Create Plant</a>
    <a href="{{ route('plants.index') }}" class="btn">List Plants</a>
</div>
@endsection