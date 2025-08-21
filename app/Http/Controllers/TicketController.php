<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'flight_id' => ['required', 'exists:flights,id'],
            'seats' => ['required', 'integer', 'min:1']
        ]);
        $flight = Flight::findOrFail($data['flight_id']);
        if ($flight->seats_available < $data['seats']) {
            return response()->json(['message' => __('messages.no_seats_available')], 422);
        }
        $ticket = Ticket::create([
            'user_id' => $request->user()->id,
            'flight_id' => $flight->id,
            'locator' => Str::upper(Str::random(6)),
            'seats' => $data['seats'],
            'status' => 'reserved'
        ]);
        $flight->decrement('seats_available', $data['seats']);
        return response()->json($ticket->load('flight'),201);
    }

    public function mine(Request $request){
        return Ticket::with('flight')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();
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
        
        $data = $request->validate([
            'flight_id' => ['required', 'exists:flights,id'],
            'seats' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'in:reserved,canceled,paid']
        ]);

        $flight = Flight::findOrFail($data['flight_id']);
        if ($flight->seats_available < $data['seats']) {
            return response()->json(['message' => __('messages.no_seats_available')], 422);
        }
        $ticket = Ticket::findOrFail($id);
        $ticket->update([
            'flight_id' => $flight->id,
            'seats' => $data['seats'],
            'status' => $data['status']
        ]);
        $flight->decrement('seats_available', $data['seats']);
        $flight->increment('seats_available', $ticket->seats);
        return response()->json($ticket->load(relations: 'flight'),200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
