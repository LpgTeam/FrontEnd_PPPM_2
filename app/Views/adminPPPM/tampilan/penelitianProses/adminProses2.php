<? //= $this->extend('adminPPPM/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templatePenelitian') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Penelitian <?= $penelitian['jenis_penelitian'];?></h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 d-flex justify-content-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Proposal</h3>
                            <p>
                                Proses peninjauan dan persetujuan proposal penelitian
                                yang diajukan oleh dosen
                            </p>
                        </div>
                    </div>

                    <!-- Di danai Institusi & institusi -->
                    <?php if ($penelitian['jenis_penelitian'] == 'Di Danai Institusi' || $penelitian['jenis_penelitian'] == 'Institusi') { ?>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="service-box orange service-box2">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Kontrak</h3>
                                <p>
                                    Persetujuan kontrak antara pihak Peneliti dengan pihak Politeknik Statistika STIS
                                </p>
                            </div>
                        </div>

                    <?php } else if ($penelitian['jenis_penelitian'] == 'Semi Mandiri') { ?>
                        <!-- Semi Mandiri                     -->
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="service-box orange service-box2">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Pendanaan</h3>
                                <p>
                                    Pendanaan untuk kegiatan publikasi dari penelitian yang
                                    dilakukan oleh dosen
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-box green">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Laporan</h3>
                            <p>
                                Pelaporan hasil kegiatan penelitain yang dilakukan oleh dosen
                            </p>
                        </div>
                    </div>


                </div>
            </div>
            <br>
            <br>
            <!-- End Proses -->

            <div class="row" data-aos="fade-up">
                <!-- didanai institusi &institusi -->
                <?php if ($penelitian['jenis_penelitian'] == 'Di Danai Institusi' || $penelitian['jenis_penelitian'] == 'Institusi') { ?>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Kontrak Penelitian</h5>
                                <hr>
                                <p>Persetujuan kontrak penelitian yang dilakukan antara pihak Peneliti
                                    yaitu dosen dengan pihak Politeknik Statistika STIS</p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-secondary">Lihat Kontrak Penelitian </button>
                                    <button class="btn btn-primary">Download Kontrak Penelitian </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- semi mandiri -->
                <?php } else if ($penelitian['jenis_penelitian'] == 'Semi Mandiri') { ?>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Bukti Pendanaan</h5>
                                <hr>
                                <p>Pendanaan yang dikeluarkan oleh dosen pada saat melakukan publikasi
                                    hasil penelitian yang dilakukan oleh dosen Politeknik Statistika STIS </p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-secondary">Lihat Bukti Pendanaan </button>
                                    <button class="btn btn-primary">Download Bukti Pendanaan </button>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- Section: Timeline -->
                            <ul class="timeline-with-icons" id="list">
                            </ul>
                            <ul class="timeline-with-icons" id="keterangan">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>