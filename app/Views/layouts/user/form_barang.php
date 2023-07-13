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
    
        <!--Font Awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <title>Selamat Datang</title>
    </head>
    <body>
      <!--Navbar-->
      <?= $this->include('layouts/user/navbar') ?>
      <!--End Navbar-->

    <div class="container">
    <div class="card text-center mt-5">
        <div class="card-header" style="text-align: left;">
            <h2><b>Form Input Barang</b></h2>
        </div>
        <div class="card-body" style="text-align: left;">
            <form action="/tambahBarang" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_produk" class="form-label"><b>Nama Produk</b></label>
                    <input type="text" class="form-control" id="nama_produk" placeholder="Enter text" name="nama_produk">
                </div>
                <label class="form-label"><b>Kategori</b></label>
                <select class="form-select" aria-label="Default select example" name="kategori">
                    <option selected>Pilih</option>
                    <option value="1">Laptop</option>
                    <option value="2">Keyboard</option>
                    <option value="3">Mouse</option>
                    <option value="4">Headset</option>
                    <option value="5">Smartphone</option>
                    <option value="6">PC Parts</option>
                </select>
                <div class="mb-3 mt-3">
                    <label for="formFileMultiple" class="form-label"><b>Foto Produk</b></label>
                    <input class="form-control" type="file" id="formFileMultiple" multiple name="gambar">
                </div>
                <div class="mb-2">
                    <label for="deskripsi_produk" class="form-label"><b>Deskripsi Produk</b></label>
                    <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" rows="13"></textarea>
                </div>
                <div class="mb-3">
    <label for="start_time" class="form-label"><b>Start Time</b></label>
    <input type="datetime-local" class="form-control" id="start_time" name="start_time">
</div>

<div class="mb-3">
    <label for="end_time" class="form-label"><b>End Time</b></label>
    <input type="datetime-local" class="form-control" id="end_time" name="end_time">
</div>

<div class="mb-3">
    <label for="starting_price" class="form-label"><b>Starting Price</b></label>
    <input type="number" class="form-control" id="starting_price" name="starting_price">
</div>

<div class="mb-3">
    <label for="starting_price" class="form-label"><b>Buy Now Price</b></label>
    <input type="number" class="form-control" id="starting_price" name="buy_now_price">
</div>

                <div class="button">
                    <button type="submit" class="btn btn-success mb-4 ms-3 float-start">Upload</button>
                    <a href="/cancel" class="btn btn-danger mb-4 ms-2 float-start">Cancel</a>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted">
            <br>
        </div>
    </div>
</div>
<!--End Form Barang-->

    <br><br><br>

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
    
</body>
</html>