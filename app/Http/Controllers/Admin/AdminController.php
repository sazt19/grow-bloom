<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use App\Models\Order;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin Panel';
        $viewData['totalPlants'] = Plant::count();
        $viewData['totalOrders'] = Order::count();

        return view('admin.index')->with('viewData', $viewData);
    }
}
