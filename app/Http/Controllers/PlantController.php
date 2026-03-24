<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class PlantController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function create()
    {
        return view('plants.create');
    }

    public function store(Request $request):RedirectResponse
    {
        $plant = new Plant();
        $plant->setName($request->input('name'));
        $plant->setType($request->input('type'));
        $plant->setPrice((float) $request->input('price'));
        $plant->setCaution($request->input('caution'));
        $plant->setDescription($request->input('description'));
        $plant->setImage($request->input('image'));
        $plant->save();

        return redirect()
            ->route('plants.create')
            ->with('success', 'Plant created successfully.');
    }

    public function index()
    {
        $plants = Plant::select('id', 'name')->get();
        return view('plants.index', compact('plants'));
    }

    public function show($id)
    {
        $plant = Plant::findOrFail($id);
        return view('plants.show', compact('plant'));
    }

    public function destroy($id)
    {
        $plant = Plant::findOrFail($id);
        $plant->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Plant deleted successfully.');
    }
}