<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'origin' => ['nullable','string','max:3'],
            'destination' => ['nullable','string','max:3'],
            'date' => ['nullable', 'data'],
            'page' => ['nullable','integer','min:1'],
            'per_page' => ['nullable','integer','min:1','max:100']
        ]);

        $perPage = (int)($request->input('per_page',10));
        $query = Flight::query()
            ->when($request->origin, fn ($query,$value) => $query->where('origin', strtoupper($value)))
            ->when($request->destination, fn ($query,$value) => $query->where('destination', strtoupper($value)))
            ->when($request->date, fn ($query,$value) => $query->where('departure_at', $value))
            ->orderBy('departure_at');

        return $query->paginate($perPage)->appends($request->query());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
