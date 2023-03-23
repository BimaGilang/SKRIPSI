@extends('layout.main')
@section('judul')
<h1>Daftar Pembelian</h1>
@endsection

@section('isi')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pembelian</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <button class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah</button>
        </div>
        <div class="card-body">
            <table class="table table-stiped table-bordered">
                <thead>
                    <th width="5%">No</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Nominal</th>
                    <th width="15%"><i class="fa fa-cog"></i></th>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection