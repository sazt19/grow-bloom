<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PlantController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Plants';
        $viewData['plants'] = Plant::all();

        return view('plant.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Plant';

        return view('plant.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        Plant::validate($request);
        Plant::create($request->all());

        return redirect()->route('plant.index')
            ->with('success', 'Plant created successfully');
    }

    public function show($id): View
    {
        $viewData = [];
        $plant = Plant::findOrFail($id);
        $viewData['title'] = $plant->getName();
        $viewData['plant'] = $plant;

        return view('plant.show')->with('viewData', $viewData);
    }

    public function destroy($id): RedirectResponse
    {
        Plant::destroy($id);

        return redirect()->route('plant.index')
            ->with('success', 'Plant deleted successfully');
    }
}