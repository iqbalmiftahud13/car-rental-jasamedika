@extends('layouts.admin')

@section('title', 'Data Booking')
@section('page-title', 'Data Booking')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="d-flex my-5">
            <a href="{{ route('booking.create') }}">
                <button type="button" class="btn btn-primary me-5">Booking</button>
            </a>
        </div>
        <div class="d-flex">
            @foreach ($rentals as $rental)
                <div class="card w-25 mx-2">
                    <div class="card-body">
                        <label>Detail Kendaraan :</label>
                        <p class="card-text">{{ $rental->car->brand }} - {{ $rental->car->plate_number }}</p>
                        <label>Tanggal Peminjaman :</label>
                        <p class="card-text">{{ \Carbon\Carbon::parse($rental->start_date)->format('d F Y') }}</p>
                        <label>Tanggal Pengembalian :</label>
                        <p class="card-text">{{ \Carbon\Carbon::parse($rental->end_date)->format('d F Y') }}</p>
                        <label>Total Harga :</label>
                        <p class="card-text">{{ 'Rp ' . number_format($rental->total_cost, 0, ',', '.') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
