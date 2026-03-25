<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Welcome to Grow & Bloom';
        $viewData['plants'] = Plant::all();

        return view('home.index')->with('viewData', $viewData);
    }
}
