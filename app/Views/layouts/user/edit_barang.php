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

    <style>
    .image-container {
      width: 200px;
      height: 200px;
      border: 2px dashed #ccc;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      flex-direction: column-reverse;
    }

    .image-container:hover {
      border-color: #aaa;
    }

    .image-container img {
      max-width: 100%;
      max-height: 100%;
    }

    .image-container span {
      color: #aaa;
      font-size: 16px;
      text-align: center;
    }

    </style>

    <body>
      <!--Navbar-->
      <?= $this->include('layouts/user/navbar') ?>
      <!--End Navbar-->

      <div class="container">
        <div class="card text-center mt-5">
          <div class="card-header" style="text-align: left;">
              <h2><b>Edit Barang</b></h2>
          </div>
          <div class="card-body" style="text-align: left;">
          <form id="editForm" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="text" class="form-label"><b>Nama Produk</b></label>
                <input type="text" class="form-control" id="text" placeholder="<?= $barang['nama_produk']; ?>" name="nama_produk">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label"><b>Harga Beli Sekarang</b></label>
                <input type="number" class="form-control" id="text" placeholder="Ketik disini" name="buy_now_price">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label"><b>Waktu Lelang Berakhir</b></label>
                    <input type="datetime-local" class="form-control" id="end_time" name="end_time">
           
            </div>    
              <label for="text" class="form-label"><b>Foto Barang</b></label>
              <div class="mb-3 mt-3" style="display: flex;">
                <div class="image-container" id="imageContainer">           
                <input class="form-control" type="file" id="formFileMultiple" multiple name="gambar" style="opacity: 0;">
                    <span>Klik untuk memilih gambar</span>
                </div>
              </div>
              <div class="mb-2">
                  <label for="exampleFormControlTextarea1" class="form-label"><b>Deskripsi Produk</b></label>
                  <textarea class="form-control" name="deskripsi_produk" id="exampleFormControlTextarea1" rows="10" placeholder="<?= $barang['deskripsi_produk']; ?>"></textarea>
                </div>
          </div>
  
          <div class="button">
                    <button type="submit" class="btn btn-success mb-4 ms-3 float-start">Update</button>
                    <a href="/UserProfile" class="btn btn-danger mb-4 ms-2 float-start">Cancel</a>
                </div>
</form>
          <div class="card-footer text-muted">
              <br>
          </div>
      </div>  
      

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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
  // Get the barang_id from the URL
  const url = new URL(window.location.href);
  const barangId = url.pathname.split('/').pop();

  // Set the action attribute of the form
  const editForm = document.getElementById('editForm');
  editForm.action = `/editbarang/${barangId}`;
</script>
</body>
</html>