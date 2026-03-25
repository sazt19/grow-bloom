<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Plant;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'My Cart';
        $order = $this->getOrCreateOrder();
        $viewData['order'] = $order;
        $viewData['items'] = Item::where('order_id', $order->getId())->get();

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $plantId): RedirectResponse
    {
        $plant = Plant::findOrFail($plantId);
        $order = $this->getOrCreateOrder();

        // Verificar si ya existe el item
        $existingItem = Item::where('order_id', $order->getId())
            ->where('plant_id', $plantId)
            ->first();

        if ($existingItem) {
            $existingItem->quantity += 1;
            $existingItem->price = $existingItem->quantity * $plant->getPrice();
            $existingItem->save();
        } else {
            Item::create([
                'quantity'   => 1,
                'price'      => $plant->getPrice(),
                'order_id'   => $order->getId(),
                'plant_id'   => $plantId,
                'service_id' => null,
            ]);
        }

        // Actualizar subtotal
        $order->subtotal = Item::where('order_id', $order->getId())->sum('price');
        $order->save();

        return redirect()->route('cart.index')
            ->with('success', $plant->getName() . ' added to cart!');
    }

    public function remove($itemId): RedirectResponse
    {
        $item = Item::findOrFail($itemId);
        $orderId = $item->getOrderId();
        $item->delete();

        // Actualizar subtotal
        $order = Order::findOrFail($orderId);
        $order->subtotal = Item::where('order_id', $orderId)->sum('price');
        $order->save();

        return redirect()->route('cart.index')
            ->with('success', 'Item removed from cart');
    }

    public function checkout(Request $request): RedirectResponse
    {
        $order = $this->getOrCreateOrder();
        $items = Item::where('order_id', $order->getId())->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty');
        }

        // Crear el pago
        Payment::create([
            'payment_date'      => now(),
            'amount'            => $order->getSubtotal(),
            'payment_method'    => $request->payment_method,
            'payment_status'    => 'pending',
            'receipt_image'     => 'pending',
            'verification_date' => null,
            'order_id'          => $order->getId(),
        ]);

        // Marcar la orden como pagada
        $order->item_type = 'completed';
        $order->save();

        // Limpiar sesión del carrito
        session()->forget('order_id');

        return redirect()->route('home.index')
            ->with('success', 'Order placed successfully!');
    }

    private function getOrCreateOrder(): Order
    {
        $orderId = session('order_id');

        if ($orderId) {
            $order = Order::find($orderId);
            if ($order) return $order;
        }

        $order = Order::create([
            'quantity'  => 0,
            'subtotal'  => 0,
            'item_type' => 'pending',
            'user_id'   => auth()->id(),
        ]);

        session(['order_id' => $order->getId()]);

        return $order;
    }
}