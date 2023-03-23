@extends('layout.main')
@section('judul')
<h1>Daftar Produk</h1>
@endsection

@section('isi')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <button class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah</button>
            <button class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i> Hapus</button>
            <button class="btn btn-info btn-xs btn-flat"><i class="fa fa-barcode"></i> Cetak Barcode</button>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form-produk">
                @csrf
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">
                            <input type="checkbox" name="select_all" id="select_all">
                        </th>
                        <th width="5%">No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Merk</th>
                        <th>Harga Jual</th>
                        <th>Diskon</th>
                        <th>Stok</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection