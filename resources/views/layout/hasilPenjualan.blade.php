@extends('layout.main')
@section('judul')
<h1>Daftar Hasil Penjualan</h1>
@endsection

@section('isi')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Hasil Penjualan</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-stiped table-bordered table-penjualan">
                <thead>
                    <th width="5%">No</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                    <th>Diskon</th>
                    <th>Total Bayar</th>
                    <th>Kasir</th>
                    <th width="15%"><i class="fa fa-cog"></i></th>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection