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
            <p hidden id="jenis"><?= $pkm['jenis_pkm']; ?></p>
            <p hidden id="alasan"><?php if ($pkm['alasan'] == null) {
                                        echo 'kosong';
                                    } else {
                                        echo $pkm['alasan'];
                                    } ?></p>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <a href="<?= base_url('pkmProses1') . "/" . $pkm["ID_pkm"]; ?>">
                            <div class="service-box blue service-box1">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Form</h3>
                                <p>
                                    Proses peninjauan form PKM yang telah diisi oleh dosen
                                    Politeknik Statistika STIS
                                </p>
                            </div>
                        </a>
                    </div>

                    <?php if ($pkm['jenis_pkm'] != 'Mandiri') { ?>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <?php if ($pkm['id_status'] > 2 && !($pkm['id_status'] >= 5 && $pkm['id_status'] <= 6)) { ?>
                                <a href="<?= base_url('pkmProses2') . "/" . $pkm["ID_pkm"]; ?>">
                                    <div class="service-box green">
                                    <?php } else { ?>
                                        <div class="service-box secondary">
                                        <?php }  ?>

                                        <i class="ri-discuss-line icon"></i>
                                        <h3>Laporan</h3>
                                        <p>
                                            Pelaporan kegiatan PKM yang dilakukan oleh dosen
                                            Politeknik Statistika STIS
                                        </p>
                                        </div>
                                        <?php if ($pkm['id_status'] > 2 && !($pkm['id_status'] >= 5 && $pkm['id_status'] <= 6)) { ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <?php if (($pkm['id_status'] == 7)) { ?>
                            <a href="<?= base_url('pkmProses4') . "/" . $pkm["ID_pkm"]; ?>">
                                <div class="service-box purple">
                                <?php } else { ?>
                                    <div class="service-box secondary">
                                    <?php }  ?>
                                    <i class="ri-discuss-line icon"></i>
                                    <h3>Selesai</h3>
                                    <p>
                                        Proses PKM selesai dilaksanakan oleh dosen
                                        Politeknik Statistika STIS
                                    </p>
                                    </div>
                                    <?php if ($pkm['id_status'] == 7) { ?>
                            </a>
                        <?php } ?>
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
                            <? //= var_dump($pkm['id_status']); 
                            ?>
                            <hr>
                            <ol>
                                <li>Topik PKM &nbsp;&nbsp;&nbsp;&nbsp;: <?= $pkm['topik_kegiatan']; ?></li>
                                <li>Jenis PKM &nbsp;&nbsp;&nbsp;&nbsp; : <?= $pkm['jenis_pkm']; ?></li>
                            </ol>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <?= $this->include('proposal/PKM/download_form_pkm'); ?>
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