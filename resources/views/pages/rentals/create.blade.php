@extends('layouts.admin')

@section('title', 'Pinjam Mobil')
@section('page-title', 'Pinjam Mobil')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('rentals.store') }}" method="POST">
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
                                                    name="user_id" id="user_id" required="required" value="{{ Auth::user()->name }}" @disabled(true)/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Merek Mobil</label>
                                                <select name="car_id" id="car_id" required class="form-select form-select-lg">
                                                    @foreach ($cars as $car)
                                                        <option 
                                                            value="{{ $car->id }}" 
                                                            data-daily_rate="{{ $car->daily_rate }}"
                                                        >
                                                            {{ $car->brand }} - {{ $car->plate_number }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label>Tanggal Peminjaman</label>
                                                <input class="form-control" type="date"
                                                    name="start_date" id="start_date" required="required" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label>Tanggal Pengembalian</label>
                                                <input class="form-control" type="date"
                                                    name="end_date" id="end_date" required="required" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label>Total Hari</label>
                                                <input class="form-control" type="text"
                                                    name="total_days" id="total_days" required="required" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label>Total Biaya</label>
                                                <input class="form-control" type="text"
                                                    name="total_cost" id="total_cost" required="required" />
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
                        <button type="submit" id="btnSubmit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
    
@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#start_date, #end_date, #car_id').on('change', function() {
                calculateRental();
            });

            function calculateRental() {
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                var carPrice = $('#car_id option:selected').data('daily_rate');

                if (startDate && endDate && carPrice) {
                    var start = moment(startDate);
                    var end = moment(endDate);

                    if (end.isBefore(start)) {
                        alert('End date must be after start date.');
                        return;
                    }

                    var totalDays = end.diff(start, 'days') + 1; // Adding 1 to include the end date
                    var totalCost = totalDays * carPrice;

                    $('#total_days').val(totalDays);
                    $('#total_cost').val(totalCost);
                }
            }
        });
    </script>
@endpush