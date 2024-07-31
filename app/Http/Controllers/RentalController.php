<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::where('user_id', auth()->id())->with(['user','car'])->get();
        if (request()->ajax()) {
            return DataTables::of($rentals)->make(true);
        }
        return view('pages.rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::where('status', 'available')->get();
        return view('pages.rentals.create', compact('cars'));
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

        return redirect()->route('rentals.index')->with('success', 'Data Rental Berhasil Ditambahkan.');
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
        $rental = Rental::findOrFail($id);
        $cars = Car::all();
        $users = User::all();
        return view('pages.rentals.edit', compact('rental', 'cars', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_days' => 'required|integer',
            'total_cost' => 'required|numeric',
        ]);

        $rental = Rental::findOrFail($id);

        $rental->update([
            'car_id' => $request->input('car_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'total_days' => $request->input('total_days'),
            'total_cost' => $request->input('total_cost'),
        ]);

        return redirect()->route('rentals.index')->with('success', 'Data Rental Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $car = Car::findOrFail($rental->car_id);

        // Update status mobil menjadi 'available'
        $car->update(['status' => 'available']);

        // Hapus data rental
        $rental->delete();
        
        return redirect()->route('rentals.index')->with('success', 'Data Rental Berhasil Dihapus.');
    }

    public function returnCar(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);
        $rental->update(['returned_at' => now()]);

        // Update status mobil menjadi 'available'
        $car = Car::findOrFail($rental->car_id);
        $car->update(['status' => 'available']);

        return redirect()->route('rentals.index')->with('success', 'Car returned successfully.');
    }
}
