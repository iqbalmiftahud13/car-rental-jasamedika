@extends('layouts.admin')

@section('title', 'Tambah Data Mobil')
@section('page-title', 'Tambah Data Mobil')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('car.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form theme-form">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Merek Mobil</label>
                                                <input class="form-control" type="text" placeholder="Merek Mobil"
                                                    name="brand" id="brand" required="required" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Model Mobil</label>
                                                <textarea id="model" class="form-control" id="exampleFormControlTextarea4" rows="3" name="model"
                                                    placeholder="Model Mobil" required="required"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Plat Nomor</label>
                                                <input class="form-control" type="text" placeholder="Plat Nomor"
                                                    name="plate_number" id="plate_number" required="required" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Tarif Per Hari</label>
                                                <input class="form-control" type="text" placeholder="Tarif Per Hari"
                                                    name="daily_rate" id="daily_rate" required="required" />
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
                        <button type="submit" id="btnSubmit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection