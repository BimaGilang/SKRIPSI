@if ($user->level == 1)
<div class="sb-sidenav-menu-heading">MASTER</div>
<li class="nav-item">
    <a href="{{ url('dashboard') }}" class="nav-link">
        <img src="{{ asset('/') }}dist/img/dashboard.png" style="width: 20px; margin-right: 10px;">
        <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('kategori') }}" class="nav-link">
        <img src="{{ asset('/') }}dist/img/kategori.png" style="width: 20px; margin-right: 10px;">
        <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
        <p>
            Kategori
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('produk') }}" class="nav-link">
        <img src="{{ asset('/') }}dist/img/barang.png" style="width: 20px; margin-right: 10px;">
        <p>
            Produk
        </p>
    </a>
</li>
<div class="sb-sidenav-menu-heading">KELOLA UANG</div>
<!-- <li class="nav-item">
    <a href="{{ url('pembelian') }}" class="nav-link">
        <img src="{{ asset('/') }}dist/img/Pembelian.png" style="width: 20px; margin-right: 10px;">
        <p>
            Pembelian
        </p>
    </a>
</li> -->
<li class="nav-item">
    <a href="{{ url('pengeluaran') }}" class="nav-link">
        <img src="{{ asset('/') }}dist/img/pengeluaran.png" style="width: 20px; margin-right: 10px;">
        <p>
            Pengeluaran
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('hasilPenjualan') }}" class="nav-link">
        <img src="{{ asset('/') }}dist/img/hasilPenjualan.png" style="width: 20px; margin-right: 10px;">
        <p>
            Hasil Penjualan
        </p>
    </a>
</li>
<div class="sb-sidenav-menu-heading">KELOLA LAPORAN</div>
<li class="nav-item">
    <a href="{{ url('laporan') }}" class="nav-link">
        <img src="{{ asset('/') }}dist/img/Laporan.png" style="width: 20px; margin-right: 10px;">
        <p>
            Laporan
        </p>
    </a>
</li>
<div class="sb-sidenav-menu-heading">PENGATURAN</div>
<li class="nav-item">
    <a href="{{ url('kasir') }}" class="nav-link">
        <img src="{{ asset('/') }}dist/img/kasir-p.png" style="width: 20px; margin-right: 10px;">
        <p>
            Kasir
        </p>
    </a>
</li>


@elseif ($user->level == 2)
<li class="nav-item">
    <a href="{{ url('penjualan') }}" class="nav-link">
        <img src="{{ asset('/') }}dist/img/kasir.png" style="width: 20px; margin-right: 10px;">
        <p>
            Transaksi
        </p>
    </a>
</li>
@endif