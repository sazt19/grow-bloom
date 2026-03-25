@extends('layouts.admin')

@section('content')
    <div class="stats-grid">
        <div class="stat-card">
            <p>Total Plants</p>
            <h2>{{ $viewData['totalPlants'] }}</h2>
        </div>
        <div class="stat-card">
            <p>Total Orders</p>
            <h2>{{ $viewData['totalOrders'] }}</h2>
        </div>
    </div>

    <div class="table-card">
        <p>Welcome to the admin panel. Use the sidebar to manage your store.</p>
    </div>
@endsection