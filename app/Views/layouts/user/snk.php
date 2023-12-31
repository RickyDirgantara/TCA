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

    <!--Form Barang-->
    <div class="container">
      <div class="card text-center mt-5">
        <div class="card-header" style="text-align: left;">
            <h2><b>SYARAT KETENTUAN</b></h2>
            <p class="mt-4"><b>PERATURAN PENJUAL - T.C.A</b>
                <br>
                1. Deskripsikan barang sesuai dengan kondisi & harus original.
                <br>
                2. Mengirimkan salah satu foto data diri seperti KTP, KTM, SIM, KP, dll. Untuk mencegah selller kabur. (tidak disalah gunakan)
                <br>
                3. Harga harus masuk akal/steal. Semakin steal, semakin cepat laku.
                <br>
                4. Apabila sudah laku, barang dipacking dengan aman, rapih, dan barang segera dikirim. (paling lama h+2 setelah laku)
                <br>
                • Contoh packing bubble wrap/box : mouse, headset, keyboard, dll. (barang ringan)
                <br>
                • Contoh packing kayu : laptop, pc, monitor, dll. (barang berat)
                <br>
                5. Jika laku diluar, wajib segera beritahu kami, untuk menghindari miskomunikasi.
                <br>
                6. Apabila barang sudah laku disini, tidak boleh cancel, tidak menerima alasan apapun.
                <br>
                7. Cancel barang yang duluan laku disini akan dikenakan denda fee sesuai fee harga barang, jika tidak dibayar denda fee, data diri seller akan kita expose.
                <br>
                8. Ongkir dibayar dahulu oleh seller & diganti pada saat pencairan dana. (tidak boleh DFOD/Delivery Fee On Delivery)
                <br>
                9. Fee dipotong setelah barang laku.
                <br>
                10. Jika barang yang sampai tidak sesuai deskripsi & gambar, buyer berhak refund.
                <br>
                11. Jika refund, ongkir pengiriman ke buyer tidak diganti.
                <br>
                12. Dana bisa Dicairkan ke bank & e-wallet.
                (contoh e-wallet : ovo, dana, gopay, dll)
                <br><br>
                TITIP JUAL DISINI = SETUJU ✅
                </p>
                <hr>
                <br>
                <p><b>PERATURAN PEMBELI - T.C.A</b>
                    <br>
                    1. Ongkir full ditanggung buyer termasuk ongkos packing & dibayar setelah ada resi, max 6 jam (jika tidak dibayar, dana hangus & pengiriman dibatalkan).
                    <br>
                    2. Jika barang sudah sampai ke alamat, segera cek & tes fungsi barangnya.
                    <br>
                    3. Batas waktu konfirmasi/komplain 1x24 jam (barang ringan), dan 2x24 jam (barang berat). Jika sudah lewat batas konfirmasi, sudah diluar tanggung jawab kita.
                    <br>
                    4. Jika ingin refund, harus disertakan bukti video unboxing barang tidak sesuai deskripsi & gambar. (tidak boleh di edit atau dipotong per video)
                    <br>
                    5. Jika refund, buyer hanya menanggung ongkir pengiriman barang ke seller.
                    (ongkir pengiriman barang ke buyer ditanggung seller)
                    <br>
                    6. Pembayaran :
                    <br>
                    • BCA - 0287661237 - TCA
                    <br>
                    • OVO - 086-23781852 - TCA
                    <br>
                    • DANA - 086-23781852 - TCA
                    <br>
                    • Tokopedia by request
                    <br><br>

                    ORDER DISINI = SETUJU ✅
                </p>    
        </div>
        
    </div>  

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