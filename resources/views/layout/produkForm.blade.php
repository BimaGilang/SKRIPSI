<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama_produk" class="col-lg-2 col-lg-offset-1 control-label">Nama</label>
                        <div class="col-lg-6">
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_kategori" class="col-lg-2 col-lg-offset-1 control-label">Kategori</label>
                        <div class="col-lg-6">
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="merk" class="col-lg-2 col-lg-offset-1 control-label">Merk</label>
                        <div class="col-lg-6">
                            <input type="text" name="merk" id="merk" class="form-control">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lingkar_dada" class="col-lg-2 col-lg-offset-1 control-label">Lingkar Dada</label>
                        <div class="col-lg-6">
                            <input type="number" name="lingkar_dada" id="lingkar_dada" class="form-control" value="0" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lingkar_paha" class="col-lg-2 col-lg-offset-1 control-label">Lingkar Paha</label>
                        <div class="col-lg-6">
                            <input type="number" name="lingkar_paha" id="lingkar_paha" class="form-control" value="0" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="panjang" class="col-lg-2 col-lg-offset-1 control-label">Panjang</label>
                        <div class="col-lg-6">
                            <input type="number" name="panjang" id="panjang" class="form-control" value="0" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_jual" class="col-lg-2 col-lg-offset-1 control-label">Harga</label>
                        <div class="col-lg-6">
                            <input type="number" name="harga_jual" id="harga_jual" class="form-control" value="0" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-lg-2 col-lg-offset-1 control-label">stok</label>
                        <div class="col-lg-6">
                            <input type="number" name="stok" id="stok" class="form-control" value="1" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>