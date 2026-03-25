<?php


namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function create(): View
    {
        return view('services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Service::validate($request);
        Service::create($request->only(['employee', 'description', 'price', 'duration']));

        return redirect()->route('services.create')
            ->with('success', 'Service created successfully.');
    }

    public function index(): View
    {
        $viewData = [];
        $viewData['services'] = Service::all();

        return view('services.index')
            ->with('viewData', $viewData);
    }

    public function show($id): View
    {
        $viewData = [];
        $viewData['service'] = Service::findOrFail($id);

        return view('services.show')
            ->with('viewData', $viewData);
    }

    public function destroy($id): RedirectResponse
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index');
    }
}