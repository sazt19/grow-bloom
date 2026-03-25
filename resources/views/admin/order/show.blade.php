@extends('layouts.admin')

@section('content')
    <div class="form-card">
        <p><strong>ID:</strong> {{ $viewData['order']->getId() }}</p>
        <p><strong>User ID:</strong> {{ $viewData['order']->getUserId() }}</p>
        <p><strong>Quantity:</strong> {{ $viewData['order']->getQuantity() }}</p>
        <p><strong>Subtotal:</strong> ${{ $viewData['order']->getSubtotal() }}</p>
        <p><strong>Item Type:</strong> {{ $viewData['order']->getItemType() }}</p>
        <p><strong>Date:</strong> {{ $viewData['order']->getFormattedDate() }}</p>
        <br>
        <a href="{{ route('admin.order.index') }}" class="btn btn-primary">← Back</a>
    </div>
@endsection