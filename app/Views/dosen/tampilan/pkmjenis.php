<? //= $this->extend('dosen/fixed/template') 
?>
<?= $this->extend('fixed/template') ?>

<?= $this->section('content'); ?>
<!-- ======= Anggaran Section ======= -->
<main id="main" class="main">
    <!-- <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Jenis PKM</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
        </div> -->
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Jenis PKM</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>

            <div class="row gy-4 justify-content-md-center">
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/Book.jpg" class="img-fluid" alt="" />
                        </div>
                        <div class="member-info">
                            <a href="/pkmForm/Mandiri" class="btn-pilih">PILIH</a>
                            <h4>PKM Mandiri</h4>
                            <p>
                                Kegatan pengabdian kepada masyarakat oleh dosen, tanpa
                                menggunakan fasilitas dana dari institusi.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/Book.jpg" class="img-fluid" alt="" />
                        </div>
                        <div class="member-info box">
                            <a href="/pkmForm/Kelompok" class="btn-pilih">PILIH</a>
                            <h4>PKM Perorangan/Kelompok</h4>
                            <p>
                                Pengabdian kepada masyarakat yang kegiatannya merupakan
                                inisiatif dari dosen atau kelompok dosen, dengan fasilitas
                                dan/atau pembiayaan dari institusi.
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/Book.jpg" class="img-fluid" alt="" />
                        </div>
                        <div class="member-info">
                            <a href="/pkmForm/Terstruktur" class="btn-pilih">PILIH</a>
                            <h4>PKM Terstruktur</h4>
                            <p>
                                Pengabdian kepada masyarakat yang kegiatannya dirancang oleh
                                pengelola atau institusi. Kegiatan dapat berkolaborasi dengan
                                mahasiswa, dengan instansi induk atau instansi lain.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Team Section -->

    <!-- </section> -->
</main>
<!-- End Testimonials Section -->
<?= $this->endSection(); ?>