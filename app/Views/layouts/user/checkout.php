<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS Eksternal-->
    <link rel="stylesheet" href="<?= base_url('user/css/style.css') ?>">

    <!--CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Checkout</title>
</head>
<body>
    <!--Navbar-->
    <?= $this->include('layouts/user/navbar') ?>
    <!--End Navbar-->

  <div class="pt-5 mt-2 container">
    <h2 class="fw-bold pt-5">Detail Order</h2>
    <hr>
  </div>

  <div class="container my-5" id="cart-container">
    <table width="100%">
      <thead>
        <tr>
          <td>Produk</td>
          <td>Nama Produk</td>
          <td>Harga</td>
        </tr>
      </thead>

      <tbody>
        <tr>
         
          <td><img src="<?php echo $barang['image']; ?>" alt=""></td>
            <td><h5><?php echo $barang['nama_produk']; ?></h5></td>
            <td><h5>Rp <?php echo $barang['buy_now_price']; ?></h5></td>
        </tr>
      </tbody>
    </table>
  </div>

  <section id="cart-bottom" class="container">
    <div class="row">
      <div class="delivery col-lg-6 col-md-6 col-12 mb-4">
        <h5>Ambil | Kirim</h5>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <h6 class="form-check-label" for="flexRadioDefault1">Ambil Di Tempat</h6>
          <p>Gratis</p>
          <p class="text-end">Rp 0.</p>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <h6 class="form-check-label" for="flexRadioDefault1">AnterAja</h6>
          <p>Reguler</p>
          <p class="text-end">Rp 12.000</p>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <h6 class="form-check-label" for="flexRadioDefault1">SiCepat</h6>
          <p>Reguler</p>
          <p class="text-end">Rp 13.000</p>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <h6 class="form-check-label" for="flexRadioDefault1">JNE</h6>
          <p>Reguler</p>
          <p class="text-end">Rp 14.000</p>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <h6 class="form-check-label" for="flexRadioDefault1">JNE</h6>
          <p>Express</p>
          <p class="text-end">Rp 36.000</p>
        </div>
      </div>
      <div class="total col-lg-6 col-md-6 col-12 mb-4">
        <h5>Total</h5>
        <div class="d-flex justify-content-between">
          <h6>Subtotal</h6>
          <p>Rp 300.000</p>
        </div>
        <div class="d-flex justify-content-between">
          <h6>Shipping</h6>
          <p>Rp 336.000</p>
        </div>
        <hr class="second-hr">
        <div class="d-flex justify-content-between">
          <h6>Total</h6>
          <p>Rp <?php echo $barang['buy_now_price']; ?></p>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a href="/bukti-pembayaran" class="btn btn-dark" type="button">Checkout</a>
        </div>
      </div>
    </div>
  </section>

  <!--Footer-->
  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="home.html" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
          <img src="assets/logo/tca.png" width="30" height="24">
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

</body>
</html>