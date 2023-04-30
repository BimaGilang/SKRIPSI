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
            <button onclick="addForm('{{ route('produk.store') }}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i>Tambah</button>
            <button onclick="deleteSelected('{{ route('produk.delete_selected') }}')" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i> Hapus</button>
            <button onclick="cetakBarcode('{{ route('produk.cetak_barcode') }}')" class="btn btn-info btn-xs btn-flat"><i class="fa fa-barcode"></i> Cetak Barcode</button>
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
                        <th>Lingkar Dada</th>
                        <th>Lingkar Paha</th>
                        <th>Panjang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </form>
        </div>
    </div>
</div>

@includeIf('layout.produkForm')
@endsection

@push('scripts')
<script>
    let table;

    $(function() {
        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: "{{ route('produk.data') }}",
            },
            columns: [{
                    data: 'select_all',
                    searchable: false,
                    sortable: false
                },
                {
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
                    data: 'nama_kategori'
                },
                {
                    data: 'merk'
                },
                {
                    data: 'lingkar_dada'
                },
                {
                    data: 'lingkar_paha'
                },
                {
                    data: 'panjang'
                },
                {
                    data: 'harga_jual'
                },
                {
                    data: 'stok'
                },
                {
                    data: 'aksi',
                    searchable: false,
                    sortable: false
                },
            ]
        });

        $('#modal-form').validator().on('submit', function(e) {
            if (!e.preventDefault()) {
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Maaf!! Tidak dapat menyimpan data');
                        return;
                    });
            }
        });

        $('[name=select_all]').on('click', function() {
            $(':checkbox').prop('checked', this.checked);
        });

    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Produk');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nama_produk').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Produk');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nama_produk]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama_produk]').val(response.nama_produk);
                $('#modal-form [name=kode_produk]').val(response.kode_produk);
                $('#modal-form [name=id_kategori]').val(response.id_kategori);
                $('#modal-form [name=merk]').val(response.merk);
                $('#modal-form [name=lingkar_dada]').val(response.lingkar_dada);
                $('#modal-form [name=lingkar_paha]').val(response.lingkar_paha);
                $('#modal-form [name=panjang]').val(response.panjang);
                $('#modal-form [name=harga_jual]').val(response.harga_jual);
                $('#modal-form [name=stok]').val(response.stok);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
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
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }

    function deleteSelected(url) {
        if ($('input:checked').length > 1) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, $('.form-produk').serialize())
                    .done((response) => {
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        } else {
            alert('Pilih data yang akan dihapus');
            return;
        }
    }

    function cetakBarcode(url) {
        if ($('input:checked').length < 1) {
            alert('Pilih data yang akan dicetak');
            return;
        } else if ($('input:checked').length < 3) {
            alert('Pilih minimal 3 data untuk dicetak');
            return;
        } else {
            $('.form-produk')
                .attr('target', '_blank')
                .attr('action', url)
                .submit();
        }
    }
</script>
@endpush