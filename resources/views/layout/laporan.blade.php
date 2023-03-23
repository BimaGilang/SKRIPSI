@extends('layout.main')
@section('judul')
<h1>Laporan Penjualan</h1>
@endsection

@section('isi')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Laporan</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <button class="btn btn-info btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Ubah Periode</button>
            <a target="_blank" class="btn btn-success btn-xs btn-flat"><i class="fa fa-file-excel-o"></i> Export PDF</a>
        </div>
        <div class="card-body">
            <table class="table table-stiped table-bordered">
                <thead>
                    <th width="5%">No</th>
                    <th>Tanggal</th>
                    <th>Hasil Penjualan</th>
                    <th>Pembelian</th>
                    <th>Pengeluaran</th>
                    <th>Pendapatan</th>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection