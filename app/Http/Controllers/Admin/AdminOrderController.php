<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin - Orders';
        $viewData['orders'] = Order::all();

        return view('admin.order.index')->with('viewData', $viewData);
    }

    public function show($id): View
    {
        $viewData = [];
        $order = Order::findOrFail($id);
        $viewData['title'] = 'Admin - Order #' . $order->getId();
        $viewData['order'] = $order;

        return view('admin.order.show')->with('viewData', $viewData);
    }

    public function destroy($id): RedirectResponse
    {
        Order::destroy($id);

        return redirect()->route('admin.order.index')
            ->with('success', 'Order deleted successfully');
    }
}
