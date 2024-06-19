<script></script>
<div class="card col-6 mx-auto mt-5">
    <div class="card-header text-center">
        Featured
    </div>
    <div class="card-body">
        <div class="container mt-5">
            <?php
            if (isset($edit)) { ?>
                <h2 class="mb-4">Form Edit Library</h2>
                <form action="<?= base_url() ?>library/aksi_edit_data" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $edit['id_item'] ?>">
                <?php
            } else { ?>
                    <h2 class="mb-4">Form Tambah Library</h2>
                    <form action="<?= base_url() ?>library/aksi_tambah_data" method="post" enctype="multipart/form-data">
                    <?php
                }
                    ?>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" <?= isset($edit['judul']) ? "value='" . $edit['judul'] . "'" : "" ?> class="form-control" id="nama" required placeholder="Judul Item" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <select name="jenis" class="form-select form-select-sm" required>
                            <option value="" <?= isset($edit['jenis']) ? "" : "selected" ?> disabled>Pilih Disini</option>
                            <option value="1" <?= (isset($edit['jenis']) && $edit['jenis'] == "1") ? "selected" : "" ?>>Buku</option>
                            <option value="2" <?= (isset($edit['jenis']) && $edit['jenis'] == "2") ? "selected" : "" ?>>Game</option>
                            <option value="3" <?= (isset($edit['jenis']) && $edit['jenis'] == "3") ? "selected" : "" ?>>Film</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <div id="parent-foto" <?= isset($edit['foto']) ? '' : 'style="display: none;"' ?>>
                            <img src="<?= isset($edit['foto']) ? base_url('upload/image/' . $edit['foto']) : "" ?>" id="fotoppost" width="300" height="auto">
                        </div>
                        <input type="file" name="foto" class="form-control form-control-sm" id="foto_element">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control form-control-sm" required placeholder="Deskripsi item"><?= isset($edit['deskripsi'])?$edit['deskripsi']:""?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#deskripsi').summernote();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#parent-foto").show();
                $('#fotoppost').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#foto_element").change(function() {
        readURL(this);
    });
</script>