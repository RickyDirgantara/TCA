<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--CSS Eksternal-->
    <link rel="stylesheet" href="css/style.css" />

    <!--CSS Bootstrap-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!--Font Awesome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <style>
      @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap");

      * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        font-family: "Open Sans", sans-serif;
      }
      body {
        line-height: 1.5;
      }
      .card-wrapper {
        max-width: 1100px;
        margin: 0 auto;
      }
      img {
        width: 100%;
        display: block;
      }
      .img-display {
        overflow: hidden;
      }
      .img-showcase {
        display: flex;
        width: 100%;
        transition: all 0.5s ease;
      }
      .img-showcase img {
        min-width: 100%;
      }
      .img-select {
        display: flex;
      }
      .img-item {
        margin: 0.3rem;
      }
      .img-item:nth-child(1),
      .img-item:nth-child(2),
      .img-item:nth-child(3) {
        margin-right: 0;
      }
      .img-item:hover {
        opacity: 0.8;
      }
      .product-content {
        padding: 2rem 1rem;
      }
      .product-title {
        font-size: 3rem;
        text-transform: capitalize;
        font-weight: 700;
        position: relative;
        color: #12263a;
        margin: 1rem 0;
      }
      .product-title::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 4px;
        width: 80px;
        background: #12263a;
      }
      .product-link {
        text-decoration: none;
        text-transform: uppercase;
        font-weight: 400;
        font-size: 0.9rem;
        display: inline-block;
        margin-bottom: 0.5rem;
        background: #256eff;
        color: #fff;
        padding: 0 0.3rem;
        transition: all 0.5s ease;
      }
      .product-link:hover {
        opacity: 0.9;
      }
      .product-rating {
        color: #ffc107;
      }
      .product-rating span {
        font-weight: 600;
        color: #252525;
      }
      .product-price {
        margin: 1rem 0;
        font-size: 1rem;
        font-weight: 700;
      }
      .product-price span {
        font-weight: 400;
      }

      .product-detail h2 {
        text-transform: capitalize;
        color: #12263a;
        padding-bottom: 0.6rem;
      }
      .product-detail p {
        font-size: 0.9rem;
        padding: 0.3rem;
        opacity: 0.8;
      }
      .product-detail ul {
        margin: 1rem 0;
        font-size: 0.9rem;
      }
      .product-detail ul li {
        margin: 0;
        font-weight: 600;
      }
      .product-detail ul li span {
        font-weight: 400;
      }
      .purchase-info {
        margin: 1.5rem 0;
      }
      .purchase-info input,
      .purchase-info .btn {
        border: 1.5px solid #ddd;
        border-radius: 25px;
        text-align: center;
        padding: 0.45rem 0.8rem;
        outline: 0;
        margin-right: 0.2rem;
        margin-bottom: 1rem;
      }
      .purchase-info input {
        width: 60px;
      }

      .purchase-info .btn {
        cursor: pointer;
        color: #fff;
      }

      .purchase-info .btn:hover {
        opacity: 0.9;
      }

      #myCarousel img {
        height: 150px;
        width: auto;
      }

      @media screen and (min-width: 992px) {
        #detailCard .card {
          display: grid;
          grid-template-columns: repeat(2, 1fr);
          grid-gap: 1.5rem;
        }
        #detailCard .card-wrapper {
          display: flex;
          justify-content: center;
          align-items: center;
        }
        .product-imgs {
          display: flex;
          flex-direction: column;
          justify-content: center;
        }
        .product-content {
          padding-top: 0;
        }
      }

      @media (min-width: 768px) {
        .carousel-inner .carousel-item-right.active,
        .carousel-inner .carousel-item-next,
        .carousel-item-next:not(.carousel-item-start) {
          transform: translateX(25%) !important;
        }

        .carousel-inner .carousel-item-left.active,
        .carousel-item-prev:not(.carousel-item-end),
        .active.carousel-item-start,
        .carousel-item-prev:not(.carousel-item-end) {
          transform: translateX(-25%) !important;
        }

        .carousel-item-next.carousel-item-start,
        .active.carousel-item-end {
          transform: translateX(0) !important;
        }

        .carousel-inner .carousel-item-prev,
        .carousel-item-prev:not(.carousel-item-end) {
          transform: translateX(-25%) !important;
        }
      }

      @media (max-width: 768px) {
        .carousel-inner .carousel-item > div {
          display: none;
        }

        .carousel-inner .carousel-item > div:first-child {
          display: block;
        }
      }

      .carousel-inner .carousel-item.active,
      .carousel-inner .carousel-item-start,
      .carousel-inner .carousel-item-next,
      .carousel-inner .carousel-item-prev {
        display: flex;
      }
      .table-container {
        max-height: 400px; 
        overflow-y: auto;
    }
    .table-wrapper {
            max-height: 200px; 
            overflow-y: auto; 
        }
    </style>
<style>
    
</style>
    <title>Selamat Datang</title>
  </head>

  <body>
    <!--Navbar-->
    <?= $this->include('layouts/user/navbar') ?>
    <!--End Navbar-->

    <div class="my-5">
      <div id="detailCard" class="card-wrapper mb-5">
        <div class="card">
          <!-- card left -->
          <div class="product-imgs">
            <div class="img-display">
              <div class="img-showcase">
              <img src="<?php echo $barang['image']; ?>" class="card-img-top" alt="Gambar Barang">
              </div>
            </div>
            <div class="img-select">
              <div class="img-item">
                
                </a>
              </div>
              <div class="img-item">
               
              </div>
              <div class="img-item">
               
              </div>
              <div class="img-item">
               
              </div>
            </div>
          </div>

            <div class="product-content">
            <h2 class="product-title"><?php echo $barang['nama_produk']; ?></h2>
            <div class="product-price">
              <p class="new-price">Harga Dasar:</p>
              <h4>Rp. <?php echo $barang['starting_price']; ?></h4>
              <p class="new-price">Harga Sekarang:</p>
              <h2>Rp. <?php echo $barang['current_price']; ?></h2>
              <p class="card-text text-center">Lelang Berakhir Pada :</p>
              <div class="countdown">
                <div id="jam"><i class="bi bi-calendar-minus" style="font-size: 15px"></i> <?php echo $barang['tanggal']; ?></div>
                <div id="menit"><i class="bi bi-clock "style="font-size: 15px"></i> <?php echo $barang['jam']; ?></div>
              </div>
            </div>




            <div class="product-detail">
              <h2>Deskripsi Barang:</h2>
              <?php echo $barang['deskripsi_produk']; ?>
            </div>

        <div class="purchase-info">
    <a href="/checkout/<?= $barang['barang_id']; ?>" class="btn btn-primary">
      Buy Now!
    </a>

    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Bid Now!
    </button>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="bidForm"> 
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Place Bid</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div id="errorMessage"></div><br>
          <div class="form-group">
            <label for="bidAmount">Bid Amount: </label>
            <input type="number" class="form-control" name="bidAmount" id="bidAmount" required min="0">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="submitBidButton">Submit Bid</button> <!-- Ubah tombol menjadi type="submit" -->
        </div>
      </form> <!-- Akhiri elemen <form> di sini -->
    </div>
  </div>
</div>

<div class="container">
  <div class="table-responsive table-wrapper">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Participant</th>
          <th>Bid Amount</th>
          <th>Bid Time</th>
        </tr>
      </thead>
      <tbody id="bidList">
        <?php
        $sortedBids = $bids;
        usort($sortedBids, function($a, $b) {
          return $b['amount'] - $a['amount'];
        });
        foreach ($sortedBids as $bid):
        ?>
        <tr>
          <td><?= $bid['user_name']; ?></td>
          <td>Rp. <?= $bid['amount']; ?></td>
          <td><?= $bid['bid_time']; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
        </div>
          </div>
        </div>
      </div>

  
      <div id="myCarousel" class="carousel carousel-dark slide container" data-interval="false">
    <div class="carousel-inner" style="width: 100%">
        <?php foreach ($rekomendasiBarangs as $index => $rekomendasiBarang) : ?>
            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <div class="col-md-3 px-2">
                    <div class="card">
                    <a href="/detailbarang/<?= $rekomendasiBarang['barang_id']; ?>">
                            <?php if (!empty($rekomendasiBarang['image'])) : ?>
                                <img src="<?= $rekomendasiBarang['image']; ?>" class="card-img-top pt-3 img-fluid" alt="Gambar Barang">
                            <?php else : ?>
                                <img src="<?= base_url('path/to/default-image.jpg') ?>" class="card-img-top pt-3 img-fluid" alt="Gambar Default">
                            <?php endif; ?>
                        </a>
                        <div class="card-body">
                            <h6 class="card-title mb-2" style="font: bold; color: black; font-size: 15px"><?= $rekomendasiBarang['nama_produk']; ?></h6>
                            <small style="color: #656565; font-size: 12px">
                                <i class="fa-solid fa-calendar-days" style="font-size: 15px"></i> <?= $rekomendasiBarang['end_time']; ?>
                            </small>
                            <h6 class="mt-1 mb-0" style="font-weight: 600; color: black">Rp <?= $rekomendasiBarang['starting_price']; ?></h6>
                            <small style="color: #656565; font-size: 12px">
                                <i class="fa-solid fa-location-dot" style="font-size: 15px"></i> SEMARANG
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


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



    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://code.jquery.com/jquery-3.7.0.slim.min.js"
      integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE="
      crossorigin="anonymous"
    ></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
  var bidForm = document.getElementById('bidForm');
  var bidButton = document.getElementById('submitBidButton');
  var bidAmountSelect = document.getElementById('bidAmount');
  var bidListElement = document.getElementById('bidList');
  var totalBidsElement = document.getElementById('totalBids');
  var currentPriceElement = document.getElementById('currentPrice');
  var errorMessageElement = document.getElementById('errorMessage');
  var barangId = <?php echo json_encode($barang['barang_id']); ?>;
    function updateTotalBidsDisplay(totalBids) {
            totalBidsElement.innerText = totalBids;
        }
        function updateBidList(bids) {
            bidListElement.innerHTML = '';
            for (var i = 0; i < bids.length; i++) {
                var bid = bids[i];
                var row = document.createElement('tr');
                row.innerHTML =
                    '<td>' + bid.participant + '</td>' +
                    '<td>' + bid.amount + '</td>' +
                    '<td>' + bid.time + '</td>';
                bidListElement.appendChild(row);
            }
        }
        function checkIfBidsExistInDatabase() {
            fetch('/checkIfBidsExistInDatabase')
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    if (data && data.bidsExist) {
                        console.log('Data bids exist in the database');
                    } else {
                        console.log('Data bids does not exist in the database');
                    }
                })
                .catch(function(error) {
                    console.log('Error: ' + error);
                });
        }
        checkIfBidsExistInDatabase();

        bidForm.addEventListener('submit', function(event) {
    event.preventDefault(); 
    var bidAmountInput = document.getElementById('bidAmount');
    var bidAmount = bidAmountInput.value;
    var formData = new FormData();
    formData.append('bidAmount', bidAmount);

    fetch('/detailbarang/' + barangId, {
      method: 'POST',
      body: formData
    })
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        if (data && data.status === 'error') {
            var errorMessage = data.message;
            errorMessageElement.innerText = errorMessage;
        } else if (data && data.status === 'success') {
          var totalBids = data.totalBids;
          console.log('Jumlah total penawaran: ' + totalBids);
          bidListElement.innerHTML = '';
          totalBidsElement.innerText = totalBids;
          var currentPrice = data.currentPrice;
          currentPriceElement.innerText = currentPrice;
          var bids = data.bids;
          if (bids && bids.length > 0) {
            for (var i = 0; i < bids.length; i++) {
              var bid = bids[i];
              var row = document.createElement('tr');
              row.innerHTML =
                '<td>' + bid.participant + '</td>' +
                '<td>' + bid.amount + '</td>' +
                '<td>' + bid.time + '</td>';
              bidListElement.appendChild(row);
            }
          }
          localStorage.setItem('currentPrice', currentPrice);
        } else {
          var errorMessage = data.message;
          console.log('Error: ' + errorMessage);
        }
        location.reload();
      })
      .catch(function(error) {
        console.log('Error: ' + error);
      });
  });

</script>


    <script>
      const imgs = document.querySelectorAll(".img-select a");
      const imgBtns = [...imgs];
      let imgId = 1;

      imgBtns.forEach((imgItem) => {
        imgItem.addEventListener("click", (event) => {
          event.preventDefault();
          imgId = imgItem.dataset.id;
          slideImage();
        });
      });

      function slideImage() {
        const displayWidth = document.querySelector(".img-showcase img:first-child").clientWidth;

        document.querySelector(".img-showcase").style.transform = `translateX(${-(imgId - 1) * displayWidth}px)`;
      }

      window.addEventListener("resize", slideImage);

      $(".carousel .carousel-item").each(function () {
        var minPerSlide = 2;
        var next = $(this).next();
        if (!next.length) {
          next = $(this).siblings(":first");
        }
        next.children(":first-child").clone().appendTo($(this));

        for (var i = 0; i < minPerSlide; i++) {
          next = next.next();
          if (!next.length) {
            next = $(this).siblings(":first");
          }
          next.children(":first-child").clone().appendTo($(this));
        }
      });

        getTotalBids();

        checkIfBidsExistInDatabase();
    </script>

<script>
      const imgs = document.querySelectorAll(".img-select a");
      const imgBtns = [...imgs];
      let imgId = 1;

      imgBtns.forEach((imgItem) => {
        imgItem.addEventListener("click", (event) => {
          event.preventDefault();
          imgId = imgItem.dataset.id;
          slideImage();
        });
      });

      function slideImage() {
        const displayWidth = document.querySelector(".img-showcase img:first-child").clientWidth;

        document.querySelector(".img-showcase").style.transform = `translateX(${-(imgId - 1) * displayWidth}px)`;
      }

      window.addEventListener("resize", slideImage);

      $(".carousel .carousel-item").each(function () {
        var minPerSlide = 2;
        var next = $(this).next();
        if (!next.length) {
          next = $(this).siblings(":first");
        }
        next.children(":first-child").clone().appendTo($(this));

        for (var i = 0; i < minPerSlide; i++) {
          next = next.next();
          if (!next.length) {
            next = $(this).siblings(":first");
          }
          next.children(":first-child").clone().appendTo($(this));
        }
      });
    </script>

  </body>
</html>
