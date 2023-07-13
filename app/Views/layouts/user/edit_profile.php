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
        
        <title>Edit Profile</title>
    </head>

    <style>
    body {
    background: rgb(255, 255, 255)
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #030303
    }

    .profile-button {
        background: rgb(56, 55, 55);
        box-shadow: none;
        border: none;
    }

    .profile-button:hover {
        background: #000000;
    }

    .profile-button:focus {
        background: 2e2d2e;
        box-shadow: none;
    }

    .profile-button:active {
        background: #2e2d2e;
        box-shadow: none;
    }

    .back:hover {
        color: #2e2d2e;
        cursor: pointer;
    }

    .labels {
        font-size: 11px;
    }

    .add-experience:hover {
        background: #4d4a4d;
        color: #fff;
        cursor: pointer;
        border: solid 1px #090909
    }
    </style>

    <body>
      <!--Navbar-->
      <?= $this->include('layouts/user/navbar') ?>
      <!--End Navbar-->

      <div class="container rounded bg-white mt-5 mb-5" style="border-radius: 10px; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4)">
        <div class="row" style="justify-content: space-around;">
            <div class="col-md-3 border-right">
                <div class="mt-3 text-center"><a class="btn btn-danger" type="button" href="/UserProfile" style="display: block;">Back</a></div>
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div class="card">
                <?php if ($user && !empty($user['image_path'])): ?>
    <img class="card-img-top" width="150px" src="<?= base_url($user['image_path']); ?>">
<?php endif; ?>
                </div>
<form method="POST" action="/UpdateUserProfile" enctype="multipart/form-data">
    <div class="file btn btn-lg btn-dark" style="position: relative; overflow: hidden; font-size: 11px;">
        Upload Foto
        <input type="file" name="image_path" style="position: absolute; opacity: 0; right: 0; top: 0;"/>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
                      <?php if ($namaUser && $emailUser && $phoneUser && $addressUser): ?>
                    <span class="font-weight-bold"><?= $namaUser; ?></span><span class="text-black-50"><?= $emailUser; ?></span><span></span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                    <form method="POST" action="/UpdateUser">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">                 
                        <div class="col-md-12"><label class="labels">Nama Lengkap</label><input type="text" name="full_name" class="form-control" placeholder="<?= $namaUser; ?>"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="email" name="email" class="form-control" placeholder="<?= $emailUser; ?>"></div>
                        <div class="col-md-12"><label class="labels">Username</label><input type="text" name="username" class="form-control" placeholder="<?= $nickUser; ?>"></div>
                        <div class="col-md-12"><label class="labels">Nomor Telepon</label><input type="tel" name="phone_number" class="form-control" placeholder="<?= $phoneUser; ?>"></div>
                        <div class="col-md-12"><label class="labels">Alamat</label><input type="text" name="address" class="form-control" placeholder="<?= $addressUser; ?>"></div>
                        <div class="col-md-12"><label class="labels">Old Password</label><input type="password" name="old_password" class="form-control" value=""></div>
                        <div class="col-md-12"><label class="labels">New Password</label><input type="password" name="new_password" class="form-control" value=""></div>
                        <?php endif; ?>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                    </form>
                </div>
            </div>
        </div>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>