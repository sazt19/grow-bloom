<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class PlantController extends Controller
{
    public function home(){
        return view('home');
    }

    public function create(){
        return view('plants.create');
    }

    public function store(Request $request):RedirectResponse{
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'caution' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
        ]);

        Plant::create($validated);

        return redirect()
            ->route('plants.create')
            ->with('success', 'Plant created successfully.');
    }

    public function index(){
        $plants = Plant::select('id', 'name')->get();
        return view('plants.index', compact('plants'));
    }

    public function show($id){
        $plant = Plant::findOrFail($id);
        return view('plants.show', compact('plant'));
    }

    public function destroy($id){
        $plant = Plant::findOrFail($id);
        $plant->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Plant deleted successfully.');
    }
}