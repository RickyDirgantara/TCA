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
        
        <title>Selamat Datang</title>
    </head>
    <body>
      <!--Navbar-->
      <?= $this->include('layouts/user/navbar') ?>
      <!--End Navbar-->

      <!--Photo-->
      <div class="container w-100">
        <h3 class="fw-bold" style="margin-top: 4rem; text-align: center;">Masukkan Bukti Pembayaran</h3>
        <div class="card bg-dark text-white mt-2" id="foto-container">
          <img src="" class="card-img" alt="">
        </div>
        <div class="container" id="file-container">
          <div class="file btn btn-lg btn-primary" style="position: relative; overflow: hidden;">
          Upload Foto
          <input type="file" name="file" style="position: absolute; font-size: 50px; opacity: 0; right: 0; top: 0;"/>
        </div>
        </div>
      </div>
      <!--End Photo-->


      <br><br><br><br><br><br><br><br>

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