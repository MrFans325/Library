<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url() ?>">Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= base_url() ?>library/tampil_data/1">Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= base_url() ?>library/tampil_data/2">Game</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= base_url() ?>library/tampil_data/3">Film</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="get" action="<?= base_url()?>library/tampil_data">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <?php
            if ($this->session->userdata('nama_lengkap') != '') { ?>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a type="button" class="ms-1 btn btn-primary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i></a>
                        <ul class="dropdown-menu dropdown-menu-sm-end">
                            <?php
                            ?>
                            <li><a class="dropdown-item" href="<?= base_url() ?>auth/logout">Log out</a></li>
                            <li><a class="dropdown-item" href="<?= base_url() ?>auth/tampil_user">Data Admin</a></li>
                            <li><a class="dropdown-item" href="<?= base_url() ?>auth/registrasi">Registrasi</a></li>
                            <li><a class="dropdown-item" href="<?= base_url() ?>library/tampil_data">Data Library</a></li>
                            <li><a class="dropdown-item" href="<?= base_url() ?>library/tambah_data">Tambah Library</a></li>
                        </ul>
                    </li>
                </ul>
            <?php
            } else {
            ?>
                <a type="button" class="btn btn-primary" href="<?= base_url() ?>auth/login">Login</a>
            <?php
            }
            ?>
        </div>
    </div>
</nav>