<!DOCTYPE html>
<html lang="en">
<head>
    <?php $user = session()->get('user'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS Eksternal-->
    <link rel="stylesheet" href="<?= base_url('user/css/style.css') ?>">

    <!--CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Home</title>
</head>
<body>

    <!--Navbar-->
    <?= $this->include('layouts/user/navbar') ?>
    <!--End Navbar-->

    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide mt-5" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('user/assets/carousel/img1.jpg') ?>" class="d-block" alt="gambar1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Selamat Datang di T.C.A</h5>
                        <p>Tempat untuk lelang barang kesayanganmu.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('user/assets/carousel/img2.jpg') ?>" class="d-block" alt="gambar2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Selamat Datang di T.C.A</h5>
                        <p>Tempat untuk lelang barang kesayanganmu.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('user/assets/carousel/img3.jpg') ?>" class="d-block" alt="gambar3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Selamat Datang di T.C.A</h5>
                        <p>Tempat untuk lelang barang kesayanganmu.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!--End Carousel-->

    <!-- Kategori -->
    <div class="container mt-5 m-auto">
        <div class="row text-center row-container d-flex justify-content-center m-auto">
            <div class="judul-category" style="background-color: grey; padding: 5px 10px;">
                <p class="h3 text-center">KATEGORI</p>
            </div>
            <div class="menu-category">
                <a href="<?= base_url('home/index/1') ?>"><img src="<?= base_url('user/assets/logo/laptop.png') ?>" class="img-category"></a>
                <p class="mt-2">Laptop</p>
            </div>

            <div class="menu-category">
                <a href="<?= base_url('home/index/2') ?>"><img src="<?= base_url('user/assets/logo/keyboard.png') ?>" class="img-category"></a>
                <p class="mt-2">Keyboard</p>
            </div>

            <div class="menu-category">
                <a href="<?= base_url('home/index/3') ?>"><img src="<?= base_url('user/assets/logo/mouse.png') ?>" class="img-category"></a>
                <p class="mt-2">Mouse</p>
            </div>

            <div class="menu-category">
                <a href="<?= base_url('home/index/4') ?>"><img src="<?= base_url('user/assets/logo/headset.png') ?>" class="img-category"></a>
                <p class="mt-2">Headset</p>
            </div>

            <div class="menu-category">
                <a href="<?= base_url('home/index/5') ?>"><img src="<?= base_url('user/assets/logo/hp.png') ?>" class="img-category"></a>
                <p class="mt-2">Smartphone</p>
            </div>

            <div class="menu-category">
                <a href="<?= base_url('home/index/6') ?>"><img src="<?= base_url('user/assets/logo/vga.png') ?>" class="img-category"></a>
                <p class="mt-2">PC parts</p>
            </div>
        </div>
    </div>
    <!-- End Kategori -->

   <!-- Konten Barang -->
<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach ($barangs as $barang) : ?>
            <?php if ($kategori === null || $kategori === $barang['kategori']) : ?>
                <div class="col">
                <div class="card">
                    <a href="/detailbarang/<?= $barang['barang_id']; ?>">
                            <?php if (!empty($barang['image'])) : ?>
                                <img src="<?= $barang['image']; ?>" class="card-img-top pt-3 img-fluid" alt="Gambar Barang">
                            <?php else : ?>
                                <img src="<?= base_url('path/to/default-image.jpg') ?>" class="card-img-top pt-3 img-fluid" alt="Gambar Default">
                            <?php endif; ?>
                        </a>
                        <div class="card-body">
                            <h6 class="card-title mb-2" style="font: bold; color: black; font-size: 15px"><?= $barang['nama_produk']; ?></h6>
                            <small style="color: #656565; font-size: 12px">
                                <i class="fa-solid fa-calendar-days" style="font-size: 15px"></i> <?= $barang['end_time']; ?>
                            </small>
                            <h6 class="mt-1 mb-0" style="font-weight: 600; color: black"></h6>
                            <small style="color: #656565; font-size: 12px">
                                <i class="fa-solid fa-location-dot" style="font-size: 15px"></i> SEMARANG
                            </small>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

        <!-- Pagination -->
        <ul class="pagination justify-content-center mt-4">
            <?php if ($currentPage > 1) : ?>
                <li class="page-item"><a class="page-link" href="<?= base_url("/{$kategori}?page=" . ($currentPage - 1)) ?>">Previous</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php if ($i == $currentPage) echo 'active' ?>"><a class="page-link" href="<?= base_url("/{$kategori}?page=" . $i) ?>"><?= $i ?></a></li>
            <?php endfor; ?>
            <?php if ($currentPage < $totalPages) : ?>
                <li class="page-item"><a class="page-link" href="<?= base_url("/{$kategori}?page=" . ($currentPage + 1)) ?>">Next</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <!--End Konten Barang-->

    <!--Footer-->
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
    <!--End Footer-->

    <!--Script JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>
