<body>
    <div class="container mt-5">
        <h2 class="mb-4">Form Registrasi</h2>
        <form action="<?= base_url()?>auth/aksi_edit" method="post">
            <input type="hidden" name="id_user" value="<?php echo $user['id_user']?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" 
                <?php
                if(isset($user['nama_lengkap'])){
                    echo "value='".$user['nama_lengkap']."'";
                }
                ?>
                class="form-control" id="nama" required placeholder="Nama Lengkap">
                <?php echo form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required placeholder="Email" <?= (isset($user['email']))?"value='".$user['email']."'":""?>>
                <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Kata Sandi">
                <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="mb-3">
                <label for="ktp" class="form-label">Nomor Ktp</label>
                <input type="number" name="no_ktp" class="form-control" id="ktp" required placeholder="Nomor KTP" <?= (isset($user['no_ktp']))?"value='".$user['no_ktp']."'":""?>>
                <?php echo form_error('no_ktp', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control form-control-sm" required placeholder="Alamat">  <?= (isset($user['alamat']))?$user['alamat']:""?></textarea>
                <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>