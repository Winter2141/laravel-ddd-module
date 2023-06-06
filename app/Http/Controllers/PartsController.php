<?php

namespace App\Http\Controllers;

use App\Models\Parts;
use App\Http\Requests\StorePartsRequest;
use App\Http\Requests\UpdatePartsRequest;
use App\Models\Vehicle;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parts = Parts::with('vehicle')->paginate(10);

        return view('parts.index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::pluck('name', 'id');

        return view('parts.create', compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartsRequest $request)
    {
        Parts::create($request->all());

        return redirect()->route('parts.index')->with('success', 'Part created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parts $parts)
    {
        $vehicles = Vehicle::pluck('name', 'id');

        return view('parts.edit', compact('parts', 'vehicles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parts $parts)
    {
        $vehicles = Vehicle::pluck('name', 'id');

        return view('parts.edit', compact('parts', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartsRequest $request, Parts $parts)
    {
        $parts->update($request->all());

        return redirect()->route('parts.index')->with('success', 'Part updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parts $parts)
    {
        $parts->delete();

        return redirect()->route('parts.index')->with('success', 'Part deleted successfully.');
    }
}
