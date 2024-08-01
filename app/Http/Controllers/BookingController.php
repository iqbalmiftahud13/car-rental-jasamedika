<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $rentals = Rental::with(['user','car'])
            ->where('user_id', $user->id)
            ->where('status', 'ongoing')
            ->get();
        return view('pages.bookings.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::where('status', 'available')->get();
        $users = User::all();
        return view('pages.bookings.create', compact(['cars', 'users']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_days' => 'required|integer',
            'total_cost' => 'required|numeric',
        ]);

        Rental::create([
            'user_id' => auth()->id(),
            'car_id' => $request->car_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_days' => $request->total_days,
            'total_cost' => $request->total_cost,
        ]);

        $car = Car::findOrFail($request->input('car_id'));
        $car->update(['status' => 'ongoing']);

        return redirect()->route('booking.index')->with('success', 'Data Rental Berhasil Ditambahkan.');
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

    public function showReturnForm()
    {
        return view('pages.bookings.return');
    }

    public function returnCar(Request $request)
    {
        $request->validate([
            'license_plate' => 'required|string|exists:cars,license_plate',
        ]);

        $car = Car::where('license_plate', $request->license_plate)->first();
        $rental = Rental::where('car_id', $car->id)->where('status', 'ongoing')->first();

        if (!$rental) {
            return back()->withErrors(['error' => 'No ongoing rental found for this car.']);
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

        return redirect()->route('booking.index')->with('success', 'Car returned successfully.');
    }

}
