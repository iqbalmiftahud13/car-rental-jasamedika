<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;

class ReturnedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.returneds.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plate_number' => 'required|string|exists:cars,plate_number',
        ]);

        $car = Car::where('plate_number', $request->plate_number)->first();
        $rental = Rental::where('car_id', $car->id)->where('status', 'ongoing')->first();

        if (!$rental) {
            return back()->with('error', 'Tidak ditemukan penyewaan yang sedang berlangsung untuk mobil ini.');
        }

        $end_date = now();
        $start_date = new \DateTime($rental->start_date);
        $end_date = new \DateTime($end_date);
        $interval = $start_date->diff($end_date);
        $total_days = $interval->days + 1;
        $total_cost = $total_days * $car->daily_rate;

        $rental->update([
            'end_date' => $end_date,
            'total_days' => $total_days,
            'total_cost' => $total_cost,
            'status' => 'returned',
        ]);

        $car->update(['status' => 'available']);

        return redirect()->route('booking.index')->with('success', 'Pengembalian Mobil Berhasil.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
