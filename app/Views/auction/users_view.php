<!DOCTYPE html>
<html lang="en">
<?php $admin = session()->get('admin'); ?>
<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!--sidebar start-->
    <?php
// Contoh halaman yang sedang aktif
$currentPage = 'users'; // Ganti dengan halaman yang sesuai

?>
<div class="container-xxl position-relative bg-dark d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" style="background-color: #17181d"class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

      <!--sidebar start-->
      <?= $this->include('layouts/sidebar') ?>
      <!--sidebar end-->
      
      <!--main content start-->
       <!-- Content Start -->
        <div class="content" style="background-color: #212529;">
            <!-- Navbar Start -->
            <?= $this->include('layouts/navbar') ?>
            <!-- Navbar End -->
        <tbody>
        <div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Daftar Pengguna</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-secondary" onclick="openPopup(<?= $user['id'] ?>)">
                                    <i class="fa fa-cog"></i> Setting
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Popup Modal -->
<div class="modal fade" id="settingModal" tabindex="-1" aria-labelledby="settingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingModalLabel">Pengaturan Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-sm btn-warning btn-block mb-3" onclick="deactivateUser()">Nonaktifkan Pengguna</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-sm btn-info btn-block mb-3" onclick="limitBidding()">Batasi Penawaran</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-sm btn-danger btn-block mb-3" onclick="deleteUser()">Hapus Pengguna</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-sm btn-info btn-block mb-3" onclick="sendMessage()">Kirim Pesan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


            <!-- Footer Start -->
            <div class="footer">
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </br>
                        Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
                            </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
        </div>
   <!-- JavaScript Libraries -->
   <script>
    function openPopup(userId) {
        // Ubah logika sesuai dengan kebutuhan Anda
        // Misalnya, jika Anda ingin menampilkan konten pengaturan pengguna berdasarkan userId
        // Anda dapat menggunakan AJAX untuk mengambil data pengguna dan mengisi konten modal sebelum menampilkannya

        // Tampilkan modal popup
        $('#settingModal').modal('show');
    }

    function deactivateUser() {
        // Logika nonaktifkan pengguna
    }

    function limitBidding() {
        // Logika batasi penawaran
    }

    function deleteUser() {
        // Logika hapus pengguna
    }

    function sendMessage() {
        // Logika kirim pesan
    }
</script>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>