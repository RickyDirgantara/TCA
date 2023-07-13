<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <nav class="logo">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="<?= base_url('user/assets/logo/tca.png') ?>" width="47" height="37">
                </a>
            </div>
        </nav>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Cari Barang" aria-label="Cari Barang">
                <button class="btn btn-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <ul class="navbar-nav ms-auto">
                <?php if (\App\Helpers\AuthHelper::isLoggedIn()) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/checkout"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/snk"><i class="fa-solid fa-book" style="color: #fcfcfc;"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Halo, <?= $namaUser; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/UserProfile">My Profile</a></li>
                            <li><a class="dropdown-item" href="/myProfile">Settings</a></li>
                            <li><a class="dropdown-item" href="/Userlogout">Log Out</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="btn btn-light" href="/user_login" role="button">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-dark" href="/signup" role="button">Daftar</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
