<!DOCTYPE html>
<html>
<head>
    <title>Profile User</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .profile-image {
            height: 150px;
            width: 150px;
            border-radius: 50%;
        }
    </style>
</head>
<body>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php $admin = session()->get('admin'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tbody>
                        <tr>
                            <td colspan="2">
                            <?php if ($admin && isset($admin['foto'])): ?>
                           <img src="<?= base_url('/' . $admin['foto']); ?>" class="profile-image">
                            <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <form method="POST" action="/updateProfile" enctype="multipart/form-data">
                                    <input type="file" name="foto" required><br>
                                    <button type="submit" class="btn btn-primary">Upload Foto</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <table class="table">
                    <tbody>
                        <tr>
                            <td colspan="2"><h5 class="mb-3">Informasi Profil</h5></td>
                        </tr>
                        <?php if ($admin && isset($admin['nama']) && isset($admin['username'])): ?>
                            <tr>
                                <td>Nama</td>
                                <td><?= $admin['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td><?= $admin['username']; ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <a class="btn btn-success" href=""><i class="icon_check_alt2"></i> Edit Profil</a>
                <a class="btn btn-primary" href="/dashboard"><i class="icon_arrow-left"></i> Kembali ke Dashboard</a>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JavaScript script -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
