@extends('layout.main')
@section('judul')
<h1>Transaksi</h1>
@endsection

@section('isi')
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <button class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Scan Barcode</button>
        </div>

        <div class="card-body">
            <form class="form-produk">
                @csrf
                <div class="form-group row">
                    <label for="kode_produk" class="col-lg-2">Kode Produk</label>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="hidden" name="id_penjualan" id="id_penjualan">
                            <input type="hidden" name="id_produk" id="id_produk">
                            <input type="text" class="form-control" name="kode_produk" id="kode_produk">
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-8">
                    <table class="table table-stiped table-bordered table-penjualan">
                        <thead>
                            <th width="5%">No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Subtotal</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </thead>
                    </table>
                    <div class="tampil-bayar bg-primary"></div>
                    <div class="tampil-terbilang"></div>
                </div>
                <div class="col-lg-4">
                    <form class="form-penjualan" method="post">
                        @csrf
                        <input type="hidden" name="id_penjualan">
                        <input type="hidden" name="total" id="total">
                        <input type="hidden" name="total_item" id="total_item">
                        <input type="hidden" name="bayar" id="bayar">

                        <div class="form-group row">
                            <label for="totalrp" class="col-lg-4 control-label">Total</label>
                            <div class="col-lg-7">
                                <input type="text" id="totalrp" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="diskon" class="col-lg-4 control-label">Diskon</label>
                            <div class="col-lg-7">
                                <input type="number" name="diskon" id="diskon" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bayar" class="col-lg-4 control-label">Bayar</label>
                            <div class="col-lg-7">
                                <input type="text" id="bayarrp" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="diterima" class="col-lg-4 control-label">Diterima</label>
                            <div class="col-lg-7">
                                <input type="number" id="diterima" class="form-control" name="diterima">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kembali" class="col-lg-4 control-label">Kembali</label>
                            <div class="col-lg-7">
                                <input type="text" id="kembali" name="kembali" class="form-control" value="0" readonly>
                            </div>
                        </div>
                    </form>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-sm btn-flat pull-right btn-simpan"><i class="fa fa-floppy-o"></i> Simpan Transaksi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection