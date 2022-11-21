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
                <h2>Jenis Penelitian</h2>
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
                            <a href="/penelitianMandiri" class="btn-pilih">PILIH</a>
                            <h4>Penelitian Mandiri</h4>
                            <p>
                                Penelitian yang dalam proses penyelesaian serta publikasinya
                                didanai sendiri oleh dosen/peneliti
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
                            <a href="/penelitianSemiMandiri" class="btn-pilih">PILIH</a>
                            <h4>Penelitian Semi Mandiri</h4>
                            <p>
                                Penelitian yang dalam proses penelitiannya dibiayai secara
                                mandiri oleh dosen atau tim dosen, namun publikasi dalam
                                bentuk seminar nasional/internasional atau jurnal nasional/
                                internasional didanai oleh Politeknik Statistika STIS
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
                            <a href="/penelitianDidanaiInstitusi" class="btn-pilih">PILIH</a>
                            <h4>Penelitian Didanai Institusi</h4>
                            <p>
                                Penelitian yang dalam proses penyelesaian maupun publikasinya
                                didanai oleh Politeknik Statistika STIS. Penelitian yang dimaksud
                                termasuk dalam jenis penelitian dasar dan penelitian terapan
                                yang pelaksanaan penelitiannya dalam satu tahun anggaran.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <div class="row gy-4 justify-content-md-center">
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/Book.jpg" class="img-fluid" alt="" />
                        </div>
                        <div class="member-info">
                            <a href="/penelitianInstitusi" class="btn-pilih">PILIH</a>
                            <h4>Penelitian Institusi</h4>
                            <p>
                                Penelitian Institusi adalah penelitian yang dilakukan oleh
                                institusi di dalam lingkungan Politeknik Statistika STIS,
                                diantaranya penelitian yang dilaksanakan oleh Unit Kajian atau
                                unit lain yang ditunjuk.
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
                            <a href="/penelitianKerjasama" class="btn-pilih">PILIH</a>
                            <h4>Penelitian Kerjasama</h4>
                            <p>
                                Penelitian yang dalam proses penyelesaian serta publikasinya
                                didanai melalui mekanisme kerjasama.
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