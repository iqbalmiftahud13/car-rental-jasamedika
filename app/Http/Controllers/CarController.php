<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Car::all())->make(true);
        }
        return view('pages.car.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'brand' => ['required'],
            'model' => ['required'],
            'plate_number' => ['required'],
            'daily_rate' => ['required'],
        ])->validate();

        Car::create($data);
        return redirect()->route('car.index')->with('success', 'Data Berhasil Ditambahkan.');
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
        $car = Car::findOrFail($id);
        return view('pages.car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'plate_number' => 'required|unique:cars,plate_number,' . $id,
            'daily_rate' => 'required|numeric',
        ]);

        $car = Car::findOrFail($id);
        $car->update($request->all());

        return redirect()->route('car.index')->with('success', 'Data Mobil Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('car.index')->with('warning', 'Data Mobil Berhasil Dihapus.');
    }
}
