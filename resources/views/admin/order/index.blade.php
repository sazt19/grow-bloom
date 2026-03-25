@extends('layouts.admin')

@section('content')
    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Item Type</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData['orders'] as $order)
                    <tr>
                        <td>{{ $order->getId() }}</td>
                        <td>{{ $order->getUserId() }}</td>
                        <td>{{ $order->getQuantity() }}</td>
                        <td>${{ $order->getSubtotal() }}</td>
                        <td>{{ $order->getItemType() }}</td>
                        <td>{{ $order->getFormattedDate() }}</td>
                        <td>
                            <a href="{{ route('admin.order.show', $order->getId()) }}" class="btn btn-primary">View</a>
                            <form action="{{ route('admin.order.destroy', $order->getId()) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection