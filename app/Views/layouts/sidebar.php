<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar" style="background-color: #212529;">
        <a href="/dashboard" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>TCA</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <?php if (session()->get('admin')['foto']): ?>
                    <img class="rounded-circle" src="<?= base_url(session()->get('admin')['foto']); ?>" style="width: 40px; height: 40px;">
                <?php else: ?>
                <?php endif; ?>
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"><?= $namaAdmin; ?></h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
        

        <a href="/dashboard" class="nav-item nav-link <?php echo (uri_string() === 'dashboard') ? 'active' : ''; ?>">
    <i class="fa fa-tachometer-alt me-2"></i>Dashboard
</a>
<a href="/auctions" class="nav-item nav-link <?php echo (uri_string() === 'auctions') ? 'active' : ''; ?>">
    <i class="fa fa-gavel me-2"></i>Lelang
</a>
<a href="/items" class="nav-item nav-link <?php echo (uri_string() === 'items') ? 'active' : ''; ?>">
    <i class="fa fa-cubes me-2"></i>Barang
</a>
<a href="/bids" class="nav-item nav-link <?php echo (uri_string() === 'bids') ? 'active' : ''; ?>">
    <i class="fa fa-money-bill-wave me-2"></i>Penawaran
</a>
<a href="/users" class="nav-item nav-link <?php echo (uri_string() === 'users') ? 'active' : ''; ?>">
    <i class="fa fa-users me-2"></i>Pengguna
</a>
<a href="/reports" class="nav-item nav-link <?php echo (uri_string() === 'reports') ? 'active' : ''; ?>">
    <i class="fa fa-chart-bar me-2"></i>Laporan
</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="/login" class="dropdown-item">Sign in</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <a href="blank.html" class="dropdown-item">Halaman Kosong</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
