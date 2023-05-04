@extends('layout.main')
@section('judul')
<h1>Reorder Point</h1>
@endsection

@section('isi')
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('rop.update') }}" method="post" class="form-rop" data-toggle="validator">
                @csrf
                <div class="box-body">
                    <div class="alert alert-info alert-dismissible" style="display: none;">
                        <i class="icon fa fa-check"></i> Perubahan berhasil disimpan
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </div>
                    <div class="form-group row">
                        <label for="total_penjualan" class="col-lg-2 control-label">Total Penjualan</label>
                        <div class="col-lg-4">
                            <input type="text" name="total_penjualan" class="form-control" id="total_penjualan" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Total_hari_penjualan" class="col-lg-2 control-label">Total Hari Penjualan</label>
                        <div class="col-lg-4">
                            <input type="text" name="total_hari_penjualan" class="form-control" id="total_hari_penjualan" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="demand" class="col-lg-2 control-label">Demand</label>
                        <div class="col-lg-4">
                            <input name="demand" class="form-control" id="demand" readonly></input>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lead_time" class="col-lg-2 control-label">Lead Time</label>
                        <div class="col-lg-4">
                            <input name="lead_time" class="form-control" id="lead_time" required></input>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="safety_stock" class="col-lg-2 control-label">Safety Stock</label>
                        <div class="col-lg-4">
                            <input name="safety_stock" class="form-control" id="safety_stock" required></input>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="reorder_point" class="col-lg-2 control-label">Reorder Point</label>
                        <div class="col-lg-4">
                            <input name="reorder_point" class="form-control" id="reorder_point" readonly></input>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan Perhitungan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        showData();
        $('.form-rop').validator().on('submit', function(e) {
            if (!e.preventDefault()) {
                $.ajax({
                        url: $('.form-rop').attr('action'),
                        type: $('.form-rop').attr('method'),
                        data: new FormData($('.form-rop')[0]),
                        async: false,
                        processData: false,
                        contentType: false
                    })
                    .done(response => {
                        showData();
                        $('.alert').fadeIn();
                        setTimeout(() => {
                            $('.alert').fadeOut();
                        }, 3000);
                    })
                    .fail(errors => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            }
        });
    });

    function showData() {
        $.get("{{ route('rop.show') }}")
            .done(response => {
                $('[name=total_penjualan]').val(response.total_penjualan);
                $('[name=total_hari_penjualan]').val(response.total_hari_penjualan);
                $('[name=demand]').val(response.total_penjualan / response.total_hari_penjualan);
                $('[name=lead_time]').val(response.lead_time);
                $('[name=safety_stock]').val(response.safety_stock);
                $('[name=reorder_point]').val((response.lead_time * (response.total_penjualan / response.total_hari_penjualan)) + response.safety_stock);
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }
</script>
@endpush