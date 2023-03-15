@if ($user->level == 1) {
<li class="nav-item">
    <a href="{{ url('home') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('produk') }}" class="nav-link">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
            Produk
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('laporan') }}" class="nav-link">
        <i class="nav-icon fas fa-print"></i>
        <p>
            Laporan
        </p>
    </a>
</li>
}

@elseif ($user->level == 2){
<li class="nav-item">
    <a href="{{ url('penjualan') }}" class="nav-link">
        <i class="nav-icon fas fa-shopping-cart"></i>
        <p>
            Transaksi
        </p>
    </a>
</li>
}

@endif