<style>
    .movie-card {
        margin-bottom: 20px;
    }

    .movie-card img {
        max-height: 300px;
        object-fit: cover;
    }

    .movie-title {
        margin-top: 10px;
        font-size: 1.1rem;
        font-weight: bold;
        text-align: center;
    }
</style>
<main class="d-flex flex-column mx-auto col-10 mt-5">
    <h1 class="mb-4"><?= $jenis ?> Gallery</h1>
    <div class="row justify-content-center">
        <!-- Movie Card 1 -->
        <?php
        foreach ($library as $vl) {
        ?>
            <div class="col-md-4 movie-card">
                <div type="button" class="card" data-bs-toggle="modal" data-bs-target="#modaldeskripsi" onclick="displaygambar(this)" data-id="<?= $vl['id_item'] ?>" data-judul="<?= $vl['judul'] ?>" data-image="<?= base_url() ?>upload/image/<?= $vl['foto'] ?>">
                    <?php
                    if ($vl['foto'] != '') { ?>
                        <img src="<?= base_url() ?>upload/image/<?= $vl['foto'] ?>" class="card-img-top" alt="<?= $vl['judul'] ?>">
                    <?php
                    } else { ?>
                        <img src="https://via.placeholder.com/300x450.png?text=<?= $jenis ?>" class="card-img-top" alt="<?= $vl['judul'] ?>">
                    <?php
                    }
                    ?>
                    <div class="card-body">
                        <h5 class="movie-title"><?= $vl['judul'] ?></h5>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="modal fade" id="modaldeskripsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titlemodal">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="" alt="" id="gambar_modal" width="400" height="auto">
                    <div id="deskripsi" class="col-12 mt-3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <?php
                    if (isset($nama)) { ?>
                        <button type="button" class="btn btn-warning" id="edititem"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button type="button" class="btn btn-danger" id="deleteitem"><i class="fa-solid fa-trash-can"></i></button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function displaygambar(element) {
        var id = $(element).data('id');
        var foto = $(element).data('image');
        var judul = $(element).data('judul');
        <?php
        if (isset($nama)) { ?>
            $("#deleteitem").attr('data-judul', judul);
            $("#deleteitem").attr('data-id', id);
            $("#edititem").attr("data-href", `<?= base_url() ?>library/edit_data/${id}`)
        <?php } ?>
        $("#gambar_modal").attr('src', foto);
        $("#titlemodal").text('');
        $("#titlemodal").text(judul);
        $.ajax({
            url: `<?= base_url() ?>library/tampil_deskripsi/${id}`,
            success: function(html) {
                $('#deskripsi').empty();
                $('#deskripsi').html(html);
            }
        });
    }
    $(document).on("click", "#edititem", function() {
        var data_href = $(this).attr('data-href');
        window.location.href = data_href;
    });
    $(document).on("click", "#deleteitem", function() {
        var judul = $(this).attr('data-judul');
        var id = $(this).attr('data-id');
        var url = `<?= base_url() ?>library/hapus_item/${id}`;
        Swal.fire({
            title: `Apakah Kamu ingin Menghapus <?= $jenis?> ${judul}?`,
            showDenyButton: true,
            confirmButtonText: "Ya Hapus",
            denyButtonText: `Tidak jadi`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href = url;
            } else if (result.isDenied) {
                Swal.fire(`Data <?= $jenis?> ${judul} Tidak jadi dihapus`, "", "info");
            }
        });
    });
</script>