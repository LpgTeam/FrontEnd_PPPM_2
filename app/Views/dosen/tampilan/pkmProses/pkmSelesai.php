<? //= $this->extend('dosen/fixed/templatePKM') 
?>
<?= $this->extend('fixed/templatePKM') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>PKM <?= $pkm['jenis_pkm']; ?> Selesai</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <p hidden id="statusPKM"><?= $pkm['id_status']; ?></p>
            <p hidden id="alasan"><?php if ($pkm['alasan'] == null) {
                                        echo 'kosong';
                                    } else {
                                        echo $pkm['alasan'];
                                    } ?></p>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue ">
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
                        <div class="service-box purple service-box4">
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
        </div>
        <br>
        <br>
        <!-- End Proses -->

        <div class="row" data-aos="fade-up">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Surat Keterangan</h5>
                        <hr>
                        <p>Kegiatan PKM selesai dilakukan. Anda dapat melihat atau mendownload
                            surat keterangan telah melaksanakan kegiatan PKM </p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <!-- <button class="btn btn-success">Lihat</button> -->
                            <a href="/pkm/download-surat-keterangan/<?= $pkm['ID_pkm']; ?>" class="btn btn-primary">Download Surat Keterangan </a>
                        </div>

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