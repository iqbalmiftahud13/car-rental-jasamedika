@extends('layouts.admin')

@section('title', 'Ubah Data Mobil')
@section('page-title', 'Ubah Data Mobil')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('car.update', $car->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Merek Mobil</label>
                                                <input class="form-control" type="text" placeholder="Merek Mobil"
                                                    name="brand" id="brand" required="required" value="{{ $car->brand }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Model Mobil</label>
                                                <input id="model" class="form-control" id="model" rows="3" name="model"
                                                    placeholder="Model Mobil" required="required" value="{{ $car->model }}"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Plat Nomor</label>
                                                <input class="form-control" type="text" placeholder="Plat Nomor"
                                                    name="plate_number" id="plate_number" required="required" value="{{ $car->plate_number }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Tarif Per Hari</label>
                                                <input class="form-control" type="text" placeholder="Tarif Per Hari"
                                                    name="daily_rate" id="daily_rate" required="required" value="{{ $car->daily_rate }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('car.index') }}">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </a>
                        <button type="submit" id="btnSubmit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection