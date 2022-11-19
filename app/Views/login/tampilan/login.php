<?= $this->extend('login/fixed/template') ?>

<?= $this->section('content'); ?>


<!-- ======= Login Section ======= -->
<section id="kotak" class="kotak">
    <div class="container" data-aos="fade-down">
        <div class="section-header">
            <img src="assets/img/STIS.png" alt="" width="250" class="stis">
            <p>PENGELOLAAN PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT</p>
            <p class="fw-normal">PPPM POLITEKNIK STATISTIKA STIS</p>
        </div>

        <div class="row gy-4 justify-content-md-center" data-aos="fade-left">
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="box">
                    <h3 style="color: #ffa200">Dosen</h3>
                    <img src="assets/img/yellow.png" class="img-fluid" alt="" />
                    <a href="/indexDosen" class="btn-login">LOGIN</a>
                    <!-- Pop up SIPADU -->
                    <!-- <a href="" class="btn-login" data-bs-toggle="modal" data-bs-target="#ubah">LOGIN</a> -->
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="box">
                    <h3 style="color: #00c0ff">Administrator</h3>
                    <img src="assets/img/blue.png" class="img-fluid" alt="" />
                    <a href="/indexAdmin" class="btn-login">LOGIN</a>
                </div>
            </div>
        </div>
    </div>
    <i class="mobile-nav-toggle "></i>
</section>
<!-- End Login Section -->
</main>
<!-- End #main -->

<!-- Ubah dana awal -->
<div class="modal fade" id="ubah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="ubahLabel">Login dengan akun sipadu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <div class="mb-3 row justify-content-md-center">
                    <img src="assets/img/STIS.png" alt="" width="20" />
                </div> -->
                <div class="container" data-aos="fade-down">
                    <div class="section-header">
                        <img src="assets/img/SIPADU.png" alt="" width="200">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username" class="col-form-label">Username :</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="col-form-label">Password :</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-success" onclick="location.href='/indexDosen'">Ya</button>
            </div>
            <div class="w-100">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>