@extends('layout.main')
@section('judul')
<h1>Search Engine</h1>
@endsection

@section('isi')
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-group row">
                <label for="search" class="col-lg-2">Search Engine</label>
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" id="search">
                        <button onclick="" class="btn btn-info btn-flat" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script>

</script>
@endpush