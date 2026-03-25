<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminPlantController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin - Plants';
        $viewData['plants'] = Plant::all();

        return view('admin.plant.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin - Create Plant';

        return view('admin.plant.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        Plant::validate($request);
        Plant::create($request->all());

        return redirect()->route('admin.plant.index')
            ->with('success', 'Plant created successfully');
    }

    public function edit($id): View
    {
        $viewData = [];
        $plant = Plant::findOrFail($id);
        $viewData['title'] = 'Admin - Edit Plant';
        $viewData['plant'] = $plant;

        return view('admin.plant.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        Plant::validate($request);
        $plant = Plant::findOrFail($id);
        $plant->update($request->all());

        return redirect()->route('admin.plant.index')
            ->with('success', 'Plant updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Plant::destroy($id);

        return redirect()->route('admin.plant.index')
            ->with('success', 'Plant deleted successfully');
    }
}
