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
                    <th>Total Item</th>
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

@includeIf('layout.hasilPenjualanDetail')
@endsection

@push('scripts')
<script>
    let table, table1;
    $(function() {
        table = $('.table-penjualan').DataTable({
            processing: true,
            autoWidth: false,
            ajax: "{{ route('penjualan.data') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'tanggal'
                },
                {
                    data: 'total_item'
                },
                {
                    data: 'total_harga'
                },
                {
                    data: 'diskon'
                },
                {
                    data: 'bayar'
                },
                {
                    data: 'kasir'
                },
                {
                    data: 'aksi',
                    searchable: false,
                    sortable: false
                },
            ]
        });

        table1 = $('.table-detail').DataTable({
            processing: true,
            bSort: false,
            dom: 'Brt',
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
                    data: 'harga_jual'
                },
                {
                    data: 'jumlah'
                },
                {
                    data: 'subtotal'
                },
            ]
        })
    });

    function showDetail(url) {
        $('#modal-detail').modal('show');

        table1.ajax.url(url);
        table1.ajax.reload();
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
</script>
@endpush