<main class="d-flex flex-column mx-auto col-10 mt-5">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="text-center">
                    Nama
                </th>
                <th class="text-center">
                    Email
                </th>
                <th class="text-center">
                    Alamat
                </th>
                <th class="text-center">
                    KTP
                </th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-striped" <?php
                                        foreach ($user as $vu) { ?> <tr>
            <td>
                <?php echo $vu['nama_lengkap'] ?>
            </td>
            <td>
                <?php echo $vu['email'] ?>
            </td>
            <td>
                <?php echo $vu['alamat'] ?>
            </td>
            <td>
                <?php echo $vu['no_ktp'] ?>
            </td>
            <td class="text-center">
                <a type="button" class="btn btn-warning" href="<?= base_url() ?>auth/edit_user/<?php echo $vu['id_user'] ?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a type="button" class="btn btn-danger delete_user" data-nama="<?php echo $vu['nama_lengkap'] ?>" data-href="<?= base_url() ?>auth/delete_user/<?php echo $vu['id_user'] ?>">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </td>
            </tr>
        <?php
                                        }
        ?>
        </tbody>
    </table>
                                    </main>
<script>
    $(document).ready(function() {
        $(".delete_user").on('click', function() {
            var nama_user = $(this).data('nama');
            var url = $(this).data('href');
            Swal.fire({
                title: `Apakah Kamu ingin Menghapus User ${nama_user}?`,
                showDenyButton: true,
                confirmButtonText: "Ya Hapus",
                denyButtonText: `Tidak jadi`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = url;
                } else if (result.isDenied) {
                    Swal.fire(`Data User ${nama_user} Tidak jadi dihapus`, "", "info");
                }
            });
        });
    });
</script>