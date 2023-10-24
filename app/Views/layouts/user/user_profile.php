<!DOCTYPE html>
<html lang="en">

<?php $user = session()->get('user'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS Eksternal-->
    <link rel="stylesheet" href="<?= base_url('user/css/style.css') ?>">

    <!--CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .button-container {
    display: flex;
    justify-content: space-between;
    padding-right: 584px;
}
    </style>
</head>

<body>
    <!--Navbar-->
    <?= $this->include('layouts/user/navbar') ?>
    <!--End Navbar-->

    <?php if (session()->has('user') && $user['role'] === 'seller'): ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                <?php if ($imgUser): ?>
    <img src="<?= base_url($imgUser); ?>" alt="Seller Profile Image" class="card-img-top" style="height: 451px;">
<?php endif; ?>
                </div>
                </div>
                <div class="col-md-8">
                    <?php if ($namaUser && $emailUser && $phoneUser && $addressUser): ?>
                        <h2><?= $namaUser; ?></h2>
                        <p>Deskripsi singkat tentang bisnis penjual.</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-envelope-fill"></i> <?= $emailUser; ?></li>
                            <li><i class="bi bi-telephone-fill"></i><?= $phoneUser; ?></li>
                            <li><i class="bi bi-geo-alt-fill"></i><?= $addressUser; ?></li>
                            <!-- Tambahan informasi lainnya -->
                        </ul>
                    <?php endif; ?>

                    <p>Riwayat Bisnis: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="mt-4">
                        <h4>Testimoni Pelanggan</h4>
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et blandit arcu."</p>
                                <p class="card-text">- Nama Pelanggan</p>
                            </div>
                        </div>
                        <div class="button-container">
    <div class="mt-4">
        <a type="button" href="/form_barang" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
            </svg>
            Buat Lelang
        </a>
    </div>
    
</div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <h4>Barang yang dilelang</h4>
                    <?php if ($hasBarangs): ?>
    <div class="row">
    <?php foreach ($barangs as $barang): ?>
        <?php if (isset($barang['user_id']) && isset($user['role']) && $barang['user_id'] === $user['id']): ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <?php if (!empty($barang['image'])): ?>
                            <img src="<?= $barang['image']; ?>" class="card-img-top">
                        <?php else: ?>
                            <img src="path/to/default-image.jpg" class="card-img-top">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= $barang['nama_produk']; ?></h5>
                            <p class="card-text"><?= $barang['deskripsi_produk']; ?></p>
                            <a href="/previewbarangseller/<?= $barang['barang_id']; ?>" class="btn btn-primary">Lihat Barang</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    </div>

    <!-- Pagination -->
    <?php if ($totalPages > 1): ?>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($currentPage > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= base_url('UserProfile?page=' . ($currentPage - 1)); ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php if ($i == $currentPage) echo 'active'; ?>">
                        <a class="page-link" href="<?= base_url('UserProfile?page=' . $i); ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= base_url('UserProfile?page=' . ($currentPage + 1)); ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php endif; ?>

<?php else: ?>
    <p>Belum ada barang yang dilelang.</p>
<?php endif; ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
        <div class="card">
                <?php if ($imgUser): ?>
    <img src="<?= base_url($imgUser); ?>" alt="Seller Profile Image" class="card-img-top" style="height: 451px;">
<?php endif; ?>
                </div>
        </div>
        <div class="col-md-8">
            <?php if ($namaUser && $emailUser && $phoneUser && $addressUser): ?>
                <h2><?= $namaUser; ?></h2>
                <ul class="list-unstyled">
                    <li><i class="bi bi-envelope-fill"></i> <?= $emailUser; ?></li>
                    <li><i class="bi bi-telephone-fill"></i><?= $phoneUser; ?></li>
                    <li><i class="bi bi-geo-alt-fill"></i><?= $addressUser; ?></li>
                    <!-- Tambahan informasi lainnya -->
                </ul>
                <div class="mt-4">
        <a type="button" href="/myProfile" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
</svg>
            Edit Profile
        </a>
    </div>
            <?php endif; ?>
        </div>
    </div>
</div>

    <?php endif; ?>
    <!--Footer-->
    <div class="container-fluid">
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                <a class="navbar-brand" href="/">
          <img src="<?= base_url('user/assets/logo/tca.png') ?>" width="47" height="37">
          </a>
                    <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Company, Inc</span>
                </div>

                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3 text-muted"><i class="fa-solid fa-phone fa-xl"></i>086-23781852</li>
                    <li class="ms-3 text-muted"><i class="fa-brands fa-instagram fa-xl"></i>tcatech_2</li>
                </ul>
            </footer>
        </div>
    </div>
    <!--End Footer-->
    <!--Script Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-VE1zQ+K4Zf5zHx5un9TCOG0Pxdk9Wh/KB8aa0o9zO29ofh7d3XF8PP6yvlO6cufw" crossorigin="anonymous"></script>
    <!-- Countdown Timer Script -->
</body>

</html>
