@extends('Layouts.app')

@section('content')
<div style="max-width: 900px; margin: 2rem auto; padding: 0 1.5rem; font-family: 'Figtree', sans-serif;">

    <h1 style="color: #1b4332; font-size: 1.8rem; margin-bottom: 1.5rem;">🛒 My Cart</h1>

    @if(session('success'))
        <div style="background:#d8f3dc; color:#1b4332; padding:0.9rem; border-left:4px solid #40916c; border-radius:4px; margin-bottom:1.5rem;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background:#fee2e2; color:#991b1b; padding:0.9rem; border-left:4px solid #ef4444; border-radius:4px; margin-bottom:1.5rem;">
             {{ session('error') }}
        </div>
    @endif

    @if($viewData['items']->isEmpty())
        <div style="background:white; border-radius:12px; padding:3rem; text-align:center; box-shadow:0 2px 12px rgba(0,0,0,0.08);">
            <p style="font-size:3rem;"></p>
            <p style="color:#666; margin-top:1rem;">Your cart is empty</p>
            <a href="{{ route('plant.index') }}" style="display:inline-block; margin-top:1rem; background:#1b4332; color:white; padding:0.7rem 1.5rem; border-radius:8px; text-decoration:none;">
                Shop Now
            </a>
        </div>
    @else
        {{-- Items --}}
        <div style="background:white; border-radius:12px; box-shadow:0 2px 12px rgba(0,0,0,0.08); overflow:hidden; margin-bottom:1.5rem;">
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8fdf8;">
                        <th style="padding:1rem; text-align:left; color:#666; font-size:0.85rem; text-transform:uppercase;">Plant</th>
                        <th style="padding:1rem; text-align:left; color:#666; font-size:0.85rem; text-transform:uppercase;">Quantity</th>
                        <th style="padding:1rem; text-align:left; color:#666; font-size:0.85rem; text-transform:uppercase;">Price</th>
                        <th style="padding:1rem; text-align:left; color:#666; font-size:0.85rem; text-transform:uppercase;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($viewData['items'] as $item)
                        <tr style="border-top:1px solid #f0f0f0;">
                            <td style="padding:1rem;">
                                @if($item->plant_id)
                                    {{ App\Models\Plant::find($item->plant_id)->getName() }}
                                @endif
                            </td>
                            <td style="padding:1rem;">{{ $item->getQuantity() }}</td>
                            <td style="padding:1rem; font-weight:bold; color:#2d6a4f;">${{ $item->getPrice() }}</td>
                            <td style="padding:1rem;">
                                <form action="{{ route('cart.remove', $item->getId()) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background:#ef4444; color:white; border:none; padding:0.4rem 0.8rem; border-radius:6px; cursor:pointer;">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Resumen y checkout --}}
        <div style="background:white; border-radius:12px; box-shadow:0 2px 12px rgba(0,0,0,0.08); padding:1.5rem;">
            <div style="display:flex; justify-content:space-between; margin-bottom:1.5rem;">
                <span style="font-size:1.2rem; font-weight:bold; color:#1b4332;">Total:</span>
                <span style="font-size:1.5rem; font-weight:bold; color:#2d6a4f;">${{ $viewData['order']->getSubtotal() }}</span>
            </div>

            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <div style="margin-bottom:1rem;">
                    <label style="display:block; margin-bottom:0.4rem; color:#1b4332; font-weight:600;">Payment Method</label>
                    <select name="payment_method" style="width:100%; padding:0.7rem; border:1px solid #d0e8d0; border-radius:8px; font-size:1rem;">
                        <option value="credit_card">Credit Card</option>
                        <option value="debit_card">Debit Card</option>
                        <option value="cash">Cash</option>
                        <option value="transfer">Bank Transfer</option>
                    </select>
                </div>
                <button type="submit" style="width:100%; background:#1b4332; color:white; border:none; padding:1rem; border-radius:8px; font-size:1rem; font-weight:bold; cursor:pointer;">
                     Place Order
                </button>
            </form>
        </div>
    @endif
</div>
@endsection