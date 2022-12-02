<? //= $this->extend('dosen/fixed/templatePKM') 
?>
<?= $this->extend('fixed/templatePKM') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>PKM <?= $pkm['jenis_pkm'] ?></h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>

            <p hidden id="statusPKM"><?= $pkm['id_status']; ?></p>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Form</h3>
                            <p>
                                Proses peninjauan form PKM yang telah diisi oleh dosen
                                Politeknik Statistika STIS
                            </p>
                        </div>
                    </div>

                    <?php if ($pkm['jenis_pkm'] != 'Mandiri') { ?>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="service-box green">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Laporan</h3>
                                <p>
                                    Pelaporan kegiatan PKM yang dilakukan oleh dosen
                                    Politeknik Statistika STIS
                                </p>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-box purple">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Selesai</h3>
                            <p>
                                Proses PKM selesai dilaksanakan oleh dosen
                                Politeknik Statistika STIS
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <br>
            <!-- End Proses -->

            <div class="row" data-aos="fade-up">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Form</h5>
                            <hr>
                            <ol>
                                <li>Topik PKM &nbsp;&nbsp;&nbsp;&nbsp;: <?= $pkm['topik_kegiatan']; ?></li>
                                <li>Jenis PKM &nbsp;&nbsp;&nbsp;&nbsp; : <?= $pkm['jenis_pkm']; ?></li>
                            </ol>
                            <hr>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-secondary">Lihat Form </a>
                                <a href="/pkm/download-proposal/<?= $pkm['ID_pkm']; ?>" class="btn btn-primary">Download Form </a>
                            </div>
                            <!-- <div class="d-flex justify-content-between">
                                <button class="btn btn-secondary">Lihat Form </button>
                                <button class="btn btn-primary">Download Form </button>
                            </div> -->

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- Section: Timeline -->
                            <ul class="timeline-with-icons" id="listPKM">
                            </ul>
                            <ul class="timeline-with-icons" id="keteranganPKM">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>