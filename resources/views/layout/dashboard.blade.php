@extends('layout.main')
@section('judul')
<h1>Dashboard</h1>
@endsection

@section('isi')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h3>{{ $kategori }}</h3>
                    Total Kategori
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('kategori.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h3>{{ $produk }}</h3>
                    Total Produk
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('produk.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h3>{{ $penjualan }}</h3>
                    Total Penjualan
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('penjualan.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Reorder Point</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('produk.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Grafik Pendapatan {{ tanggal_indonesia($tanggal_awal, false) }} s/d {{ tanggal_indonesia($tanggal_akhir, false) }}
                </div>
                <div class="card-body">
                    <canvas id="salesChart" width="100%" height="40">

                    </canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- ChartJS -->
<script src="{{ asset('/') }}AdminLTE-3.2.0/bower_components/chart.js/Chart.js"></script>
<script>
    $(function() {
        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);

        var salesChartData = {
            labels: <?php echo json_encode($data_tanggal) ?>,
            datasets: [{
                label: 'Pendapatan',
                fillColor: 'rgba(60,141,188,0.9)',
                strokeColor: 'rgba(60,141,188,0.8)',
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: <?php echo json_encode($data_pendapatan) ?>
            }]
        };
        var salesChartOptions = {
            pointDot: false,
            responsive: true
        };
        salesChart.Line(salesChartData, salesChartOptions);
    });
</script>
@endpush