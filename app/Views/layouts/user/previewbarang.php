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
                <img src="assets/barang-hp/xiaomi-redmi-note-12.jpg" alt="image" />
                <img src="assets/barang-keyboard/hyperx_alloy_origins.jpg" alt="image" />
                <img src="assets/barang-headset/razer-kraken.jpg" alt="image" />
              </div>
            </div>
            <div class="img-select">
              <div class="img-item">
                <a href="#" data-id="1">
                 
                </a>
              </div>
              <div class="img-item">
                <a href="#" data-id="2">
                
                </a>
              </div>
              <div class="img-item">
               
                </a>
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
              <p class="new-price">Harga Beli Sekarang:</p>
              <h2>Rp. <?php echo $barang['buy_now_price']; ?></h2>
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
            <br>
              <a class="btn btn-secondary" href="/editbarang/<?= $barang['barang_id']; ?>">
                Edit Barang
            </a>

            </div>
          </div>
        </div>
      </div>


    
    </div>

    <!--Footer-->
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
          <a href="home.html" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
            <img src="assets/logo/tca.png" width="30" height="24" />
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

    <!--Script JS-->
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
