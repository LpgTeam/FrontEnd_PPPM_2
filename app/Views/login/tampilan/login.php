<?= $this->extend('login/fixed/template') ?>

<?= $this->section('content'); ?>
<i class="mobile-nav-toggle "></i>

<!-- ======= Login Section ======= -->
<section id="kotak" class="kotak">
    <div class="container" data-aos="fade-down">
        <div class="section-header">
            <img src="assets/img/STIS.png" alt="" width="250">
            <p>PENGELOLAAN PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT</p>
            <p class="fw-normal">PPPM POLITEKNIK STATISTIKA STIS</p>
        </div>

        <div class="row gy-4 justify-content-md-center" data-aos="fade-left">
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="box">
                    <h3 style="color: #ffa200">Dosen</h3>
                    <img src="assets/img/yellow.png" class="img-fluid" alt="" />
                    <a href="/indexDosen" class="btn-login">LOGIN</a>
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
</section>
<!-- End Login Section -->

</main>
<!-- End #main -->
<?= $this->endSection(); ?>