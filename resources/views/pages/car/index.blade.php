@extends('layouts.admin')

@section('title', 'Mobil')
@section('page-title', 'Mobil')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                {{-- Datatables --}}
                <div class="col-sm-12">
                    <div class="card-header">
                        <a href="{{ route('car.create') }}">
                            <button type="button" class="btn btn-primary">Tambah Data Mobil</button>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="carsTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Merek</th>
                                    <th>Model</th>
                                    <th>Nomor Plat</th>
                                    <th>Tarif Per Hari</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Datatables End --}}
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        jQuery(document).ready(function() {
            var carsTable = $('#carsTable').DataTable({
                dom: '<"row justify-content-between"<"col-lg-4 align-self-center"l><"col-lg-4 align-self-center"f>>1<"table-responsive"tr><"row justify-content-between mt-3"<"col-lg-4 align-self-center"i><"col-lg-8 align-self-center"p>>',
                autoWidth: false,
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [{
                        data: null,
                        width: '5%',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'brand',
                        render(data) {
                            return '<span class="font-weight-bold text-primary">' + data +
                                '</span>'
                        }
                    },
                    {
                        data: 'model',
                    },
                    {
                        data: 'plate_number',
                    },
                    {
                        data: 'daily_rate',
                        render: function(data) {
                            // Format as Rupiah
                            return 'Rp ' + Number(data).toLocaleString('id-ID');
                        }
                    },
                    {
                        data: 'id',
                        width: '5%',
                        render: renderAction
                    }
                ]
            });


            function renderAction(data, type, row, meta) {
                let editUrl = `{{ route('car.edit', ':id') }}`.replace(':id', data);
                let deleteUrl = `{{ route('car.destroy', ':id') }}`.replace(':id', data);
                let btn = ` <ul class="action" style="list-style: none;">
                                <li class="edit"> <a href="${editUrl}" class="bg-transparent btnEdit btn"><i class="icon-pencil-alt"></i></a>
                                <li class="delete"><button type="button" class="bg-transparent btn btnDeleteDt" data-url="${deleteUrl}"><i class="icon-trash"></i></button></li>
                            </ul>`
                return btn
            }
        });

    </script>
@endpush
