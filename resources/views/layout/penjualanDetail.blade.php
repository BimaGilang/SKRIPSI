@extends('layout.main')
@section('judul')
<h1>Transaksi</h1>
@endsection

@push('css')
<style>
    .tampil-bayar {
        font-size: 5em;
        text-align: center;
        height: 100px;
    }

    .tampil-terbilang {
        padding: 10px;
        background: #f0f0f0;
    }

    .table-penjualan tbody tr:last-child {
        display: none;
    }

    @media(max-width: 768px) {
        .tampil-bayar {
            font-size: 3em;
            height: 70px;
            padding-top: 5px;
        }
    }
</style>
@endpush

@section('isi')
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-body">
            <form class="form-produkScan">
                @csrf
                <div class="form-group row">
                    <label for="kode_produk" class="col-lg-2">Scan Produk</label>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <div id="reader" width="200px"></div>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="hidden" name="id_penjualan" id="id_penjualanScan" value="{{ $id_penjualan }}">
                            <input type="text" class="form-control col-lg-4" name="kode_produkScan" id="kode_produkScan">
                            <!-- <button onclick="tambahProdukScan()" class="btn btn-info btn-flat" type="button"><i class="fa fa-search"></i></button> -->
                        </div>
                    </div>
                </div>
            </form>
            <form class="form-produk">
                @csrf
                <div class="form-group row">
                    <label for="kode_produk" class="col-lg-2">Pilih Produk</label>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="hidden" name="id_penjualan" id="id_penjualan" value="{{ $id_penjualan }}">
                            <input type="hidden" name="id_produk" id="id_produk">
                            <input type="text" class="form-control" name="kode_produk" id="kode_produk">
                            <button onclick="tampilProduk()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
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
                            <th>Jumlah</th>
                            <!-- <th>Diskon</th> -->
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </thead>
                    </table>

                    <div class="tampil-bayar bg-primary"></div>
                    <div class="tampil-terbilang"></div>

                </div>
                <div class="col-lg-4">
                    <form action="{{ route('transaksi.simpan') }}" class="form-penjualan" method="post">
                        @csrf
                        <input type="hidden" name="id_penjualan" value="{{ $id_penjualan }}">
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
                                <input type="number" name="diskon" id="diskon" class="form-control" value="0">
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
@includeIf('layout.penjualanDetailProduk')
@includeIf('layout.penjualanDetailScan')
@endsection

@push('scripts')
<script>
    let table, table2;

    $(function() {
        $('body').addClass('sidebar-collapse');

        table = $('.table-penjualan').DataTable({
                processing: true,
                autoWidth: false,
                ajax: {
                    url: "{{ route('transaksi.data', $id_penjualan) }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'kode_produk'
                    },
                    {
                        data: 'nama_produk'
                    },
                    {
                        data: 'jumlah'
                    },
                    // {
                    //     data: 'diskon'
                    // },
                    {
                        data: 'harga_jual'
                    },
                    {
                        data: 'subtotal'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ],
                dom: 'Brt',
                bSort: false,
                paginate: false
            })
            .on('draw.dt', function() {
                loadForm($('#diskon').val());
                setTimeout(() => {
                    $('#diterima').trigger('input');
                }, 300);
            });

        table2 = $('.table-produk').DataTable();

        $(document).on('input', '.quantity', function() {
            let id = $(this).data('id');
            let jumlah = parseInt($(this).val());
            if (jumlah < 1) {
                $(this).val(1);
                alert('Jumlah tidak boleh kurang dari 1');
                return;
            }
            if (jumlah > 10000) {
                $(this).val(10000);
                alert('Jumlah tidak boleh lebih dari 10000');
                return;
            }
            $.post(`{{ url('/transaksi') }}/${id}`, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'put',
                    'jumlah': jumlah
                })
                .done(response => {
                    $(this).on('mouseout', function() {
                        table.ajax.reload(() => loadForm($('#diskon').val()));
                    });
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
        });

        $(document).on('input', '#diskon', function() {
            if ($(this).val() == "") {
                $(this).val(0).select();
            }
            loadForm($(this).val());
        });

        $('#diterima').on('input', function() {
            if ($(this).val() == "") {
                $(this).val(0).select();
            }

            loadForm($('#diskon').val(), $(this).val());
        }).focus(function() {
            $(this).select();
        });

        $('.btn-simpan').on('click', function() {
            $('.form-penjualan').submit();
        });
    });

    function tampilProduk() {
        $('#modal-produk').modal('show');
    }

    function hideProduk() {
        $('#modal-produk').modal('hide');
    }

    function pilihProduk(id, kode) {
        $('#id_produk').val(id);
        $('#kode_produk').val(kode);
        hideProduk();
        tambahProduk();
    }

    function tambahProduk() {
        $.post("{{ route('transaksi.store') }}", $('.form-produk').serialize())
            .done(response => {
                $('#kode_produk').focus();
                table.ajax.reload(() => loadForm($('#diskon').val()));
            })
            .fail(errors => {
                alert('Tidak dapat menyimpan data');
                return;
            });
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload(() => loadForm($('#diskon').val()));
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }

    function loadForm(diskon = 0, diterima = 0) {
        $('#total').val($('.total').text());
        $('#total_item').val($('.total_item').text());
        $.get(`{{ url('/transaksi/loadform') }}/${diskon}/${$('.total').text()}/${diterima}`)
            .done(response => {
                $('#totalrp').val('Rp. ' + response.totalrp);
                $('#bayarrp').val('Rp. ' + response.bayarrp);
                $('#bayar').val(response.bayar);
                $('.tampil-bayar').text('Bayar: Rp. ' + response.bayarrp);
                $('.tampil-terbilang').text(response.terbilang);

                $('#kembali').val('Rp.' + response.kembalirp);
                if ($('#diterima').val() != 0) {
                    $('.tampil-bayar').text('Kembali: Rp. ' + response.kembalirp);
                    $('.tampil-terbilang').text(response.kembali_terbilang);
                }
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            })
    }
</script>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        $("#kode_produkScan").val(decodedText);
        let hasilScan = decodedText;

        let cekid = $("#id_penjualanScan").val();

        csrf_token = $('meta[name="csrf-token"]').attr('content');

        Swal.fire({
            title: 'Succes',
            text: 'Qr Code Berhasil di Scan',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ route('transaksi.validasiQrcode') }}",
                    type: 'POST',
                    data: {
                        '_method': 'POST',
                        '_token': csrf_token,
                        'validasiQrcode': hasilScan,
                        'id_penjualan': cekid
                    },

                    success: function(response) {
                        if (response.berhasil) {
                            Swal.fire({
                                icon: 'success',
                                type: 'succes',
                                title: 'Success!',
                                text: 'Data Masuk'
                            });

                            $('#kode_produk').focus();
                            table.ajax.reload(() => loadForm($('#diskon').val()));
                        }
                        if (response.status_error) {
                            Swal.fire({
                                type: 'error',
                                tittle: 'Oopss...',
                                text: 'Data Tidak Masuk'
                            });
                        }
                    },

                    error: function(xhr) {
                        Swal.fire({
                            type: 'error',
                            tittle: 'Oopss...',
                            text: 'Somthing Wrong Brother'
                        });
                    }
                })
            }
        })
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        // console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
@endpush