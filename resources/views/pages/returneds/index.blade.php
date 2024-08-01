@extends('layouts.admin')

@section('title', 'Cek Plat Nomor Kendaraan')
@section('page-title', 'Cek Plat Nomor Kendaraan')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p style="color: red">{{ $message }}</p>
                    </div>
                @endif
                <form action="{{ route('returned.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label>Plat Nomor Kendaraan</label>
                                                <input class="form-control" type="text"
                                                    name="plate_number" id="plate_number" required="required"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('booking.index') }}">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </a>
                        <button type="submit" id="btnSubmit" class="btn btn-primary">Cek Plat Nomor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection