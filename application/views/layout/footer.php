</div>
</div>
<footer class="bg-light text-center text-lg-start mt-5">
    <div class="container p-4">
        <div class="row">
            <!-- About Us -->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">About Us</h5>
                <p>
                Kami adalah perpustakaan yang berdedikasi untuk menyediakan akses ke berbagai macam film dan sumber daya bagi komunitas kami. Misi kami adalah mempromosikan literasi, pembelajaran, dan kecintaan terhadap film.
                </p>
            </div>

            <!-- Contact -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Contact</h5>
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="mailto:info@library.com" class="text-dark">info@library.com</a>
                    </li>
                    <li>
                        <a href="tel:+1234567890" class="text-dark">+62 234 567 890</a>
                    </li>
                    <li>
                        <a href="https://goo.gl/maps/example" target="_blank" class="text-dark">123 Perpus,Depok, Jawabarat</a>
                    </li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Follow Us</h5>
                <ul class="list-unstyled d-flex justify-content-start">
                    <li>
                        <a href="https://facebook.com" target="_blank" class="me-3 text-dark">
                            <img src="https://img.icons8.com/fluent/24/000000/facebook-new.png" alt="Facebook">
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com" target="_blank" class="me-3 text-dark">
                            <img src="https://img.icons8.com/fluent/24/000000/twitter.png" alt="Twitter">
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com" target="_blank" class="me-3 text-dark">
                            <img src="https://img.icons8.com/fluent/24/000000/instagram-new.png" alt="Instagram">
                        </a>
                    </li>
                    <li>
                        <a href="https://linkedin.com" target="_blank" class="text-dark">
                            <img src="https://img.icons8.com/fluent/24/000000/linkedin.png" alt="LinkedIn">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center p-3 bg-dark text-white">
        &copy; 2024 Library. All rights reserved.
    </div>
</footer>
<script>
    $(document).ready(function() {
        <?php
        if ($this->session->flashdata('success') != '') { ?>
            Swal.fire({
                icon: "success",
                title: "<?= $this->session->flashdata('success') ?>",
                showConfirmButton: false,
                timer: 6000
            });
        <?php
        }
        ?>
        <?php
        if ($this->session->flashdata('error') != '') { ?>
            Swal.fire({
                icon: "error",
                text: "<?= $this->session->flashdata('error') ?>",
                showConfirmButton: false,
                timer: 6000
            });
        <?php
        }
        ?>
    });
</script>