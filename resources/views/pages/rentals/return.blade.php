@extends('layouts.admin')

@section('title', 'Pengembalian Mobil')
@section('page-title', 'Pengembalian Mobil')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('rentals.returnCar', ($rental->id)) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label>Nama Peminjam</label>
                                                <input class="form-control" type="text"
                                                    name="user_id" id="user_id" required="required" value="{{ Auth::user()->name }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Merek Mobil</label>
                                                <input class="form-control" type="text"
                                                    name="car_id" id="car_id" required="required" value="{{ $rental->car->brand }} - {{ $rental->car->plate_number }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label>Tanggal Peminjaman</label>
                                                <input class="form-control" type="date"
                                                    name="start_date" id="start_date" required="required" value="{{ $rental->start_date }}" disabled/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label>Tanggal Pengembalian</label>
                                                <input class="form-control" type="date"
                                                    name="end_date" id="end_date" required="required" value="{{ $rental->end_date }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label>Total Hari</label>
                                                <input class="form-control" type="text"
                                                    name="total_days" id="total_days" required="required" value="{{ $rental->total_days }}" disabled/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label>Total Biaya</label>
                                                <input class="form-control" type="text"
                                                    name="total_cost" id="total_cost" required="required" value="{{ $rental->total_cost }}" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('rentals.index') }}">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </a>
                        <button type="submit" id="btnSubmit" class="btn btn-primary">Kembalikan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection