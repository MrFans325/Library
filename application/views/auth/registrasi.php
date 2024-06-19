<div class="card text-center col-6 mx-auto mt-5">
    <div class="card-header">
        Featured
    </div>
    <div class="card-body">
        <div class="container mt-5">
            <h2 class="mb-4">Form Registrasi</h2>
            <form action="<?= base_url() ?>auth/aksi_registrasi" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" <?php
                                                        if (isset($user['nama_lengkap'])) {
                                                            echo "value='" . $user['nama_lengkap'] . "'";
                                                        }
                                                        ?> class="form-control" id="nama" required placeholder="Nama Lengkap">
                    <?php echo form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required placeholder="Email" <?= (isset($user['email'])) ? "value='" . $user['email'] . "'" : "" ?>>
                    <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" name="password" class="form-control" id="password" required placeholder="Kata Sandi" <?= (isset($user['password'])) ? "value='" . $user['password'] . "'" : "" ?>>
                    <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="ktp" class="form-label">Nomor Ktp</label>
                    <input type="text" name="no_ktp" class="form-control" id="ktp" required placeholder="Nomor KTP" <?= (isset($user['no_ktp'])) ? "value='" . $user['no_ktp'] . "'" : "" ?>>
                    <?php echo form_error('no_ktp', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control form-control-sm" required placeholder="Alamat">  <?= (isset($user['alamat'])) ? $user['alamat'] : "" ?></textarea>
                    <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Daftar</button>
            </form>
        </div>
    </div>

</div>