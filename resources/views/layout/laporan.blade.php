@extends('layout.main')
@section('judul')
<h1>Laporan Pendapatan {{ tanggal_indonesia($tanggalAwal) }} s/d {{ tanggal_indonesia($tanggalAkhir) }}</h1>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('/') }}AdminLTE-3.2.0/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endpush

@section('isi')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Laporan</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <button onclick="updatePeriode()" class="btn btn-info btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Ubah Periode</button>
            <!-- <a href="{{ route('laporan.export_pdf', [$tanggalAwal, $tanggalAkhir]) }}" target="_blank" class="btn btn-success btn-xs btn-flat"><i class="fa fa-barcode"></i> Export PDF</a> -->
        </div>
        <div class="card-body">
            <table class="table table-stiped table-bordered">
                <thead>
                    <th width="5%">No</th>
                    <th>Tanggal</th>
                    <th>Hasil Penjualan</th>
                    <th>Pengeluaran</th>
                    <th>Pendapatan</th>
                </thead>
            </table>
        </div>
    </div>
</div>

@includeIf('layout.laporanForm')
@endsection

@push('scripts')
<script src="{{ asset('/') }}AdminLTE-3.2.0/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    let table;
    $(function() {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: "{{ route('laporan.data', [$tanggalAwal, $tanggalAkhir]) }}",
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'tanggal'
                },
                {
                    data: 'penjualan'
                },
                {
                    data: 'pengeluaran'
                },
                {
                    data: 'pendapatan'
                }
            ],
            dom: 'Brt',
            bSort: false,
            bPaginate: false,
        });
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });

    function updatePeriode() {
        $('#modal-form').modal('show');
    }
</script>
@endpush