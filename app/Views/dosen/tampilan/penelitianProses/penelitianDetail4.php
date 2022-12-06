<? //= $this->extend('dosen/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templatePenelitian') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Penelitian Selesai</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <p hidden id="status"><?= $penelitian['id_status']; ?></p>
            <p hidden id="jenis"><?= $penelitian['jenis_penelitian']; ?></p>
            <p hidden id="alasan"><?php if ($penelitian['alasan'] == null) {
                                        echo 'kosong';
                                    } else {
                                        echo $penelitian['alasan'];
                                    } ?></p>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <a href="<?= base_url('penelitianProses1') . "/" . $penelitian["id_penelitian"]; ?>">
                            <div class="service-box blue">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Proposal</h3>
                                <p>
                                    Proses peninjauan dan persetujuan proposal penelitian
                                    yang diajukan oleh dosen
                                </p>
                            </div>
                        </a>
                    </div>

                    <?php
                    if ($penelitian['jenis_penelitian'] == 'Semi Mandiri') {
                    ?>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <?php if ($penelitian['id_status'] > 4 && !($penelitian['id_status'] >= 7 && $penelitian['id_status'] <= 9)) { ?>
                                <a href="<?= base_url('penelitianProses2') . "/" . $penelitian["id_penelitian"]; ?>">
                                    <div class="service-box orange">
                                    <?php } else { ?>
                                        <div class="service-box secondary">
                                        <?php } ?>

                                        <i class="ri-discuss-line icon"></i>
                                        <h3>Pendanaan</h3>
                                        <p>
                                            Pendanaan untuk kegiatan publikasi dari penelitian yang
                                            dilakukan oleh dosen
                                        </p>
                                        </div>
                                        <?php if ($penelitian['id_status'] > 4 && !($penelitian['id_status'] >= 7 && $penelitian['id_status'] <= 9)) { ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php  }
                    if ($penelitian['jenis_penelitian'] == 'Didanai Institusi' || $penelitian['jenis_penelitian'] == 'Institusi') {
                    ?>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <?php if ($penelitian['id_status'] > 4 && !($penelitian['id_status'] >= 7 && $penelitian['id_status'] <= 9)) { ?>
                                <a href="<?= base_url('penelitianProses2') . "/" . $penelitian["id_penelitian"]; ?>">
                                    <div class="service-box orange">
                                    <?php } else { ?>
                                        <div class="service-box secondary   "> <?php } ?>
                                        <i class="ri-discuss-line icon"></i>
                                        <h3>Kontrak</h3>
                                        <p>
                                            Persetujuan kontrak antara pihak Peneliti dengan pihak Politeknik Statistika STIS
                                        </p>
                                        </div>
                                        <?php if ($penelitian['id_status'] > 4 && !($penelitian['id_status'] >= 7 && $penelitian['id_status'] <= 9)) { ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <?php if ($penelitian['id_status'] == 6 || $penelitian['id_status'] == 10) { ?>
                            <a href="<?= base_url('penelitianProses3') . "/" . $penelitian["id_penelitian"]; ?>">
                                <div class="service-box green">
                                <?php } else { ?>
                                    <div class="service-box secondary"> <?php } ?>
                                    <i class="ri-discuss-line icon"></i>
                                    <h3>Laporan</h3>
                                    <p>
                                        Pelaporan hasil kegiatan penelitian yang dilakukan oleh dosen
                                    </p>
                                    </div>
                                    <?php if ($penelitian['id_status'] == 6 || $penelitian['id_status'] == 10) { ?>
                            </a>
                        <?php } ?>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <?php if ($penelitian['id_status'] == 10) { ?>
                            <a href="<?= base_url('penelitianProses4') . "/" . $penelitian["id_penelitian"]; ?>">
                                <div class="service-box purple service-box4">
                                <?php } else { ?>
                                    <div class="service-box secondary   "> <?php } ?>
                                    <i class="ri-discuss-line icon"></i>
                                    <h3>Selesai</h3>
                                    <p>
                                        Proses penelitian selesai dilaksanakan oleh dosen
                                    </p>
                                    </div>
                            </a>
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
                            <h5 class="card-title text-center">Penelitian Selesai</h5>
                            <hr>
                            <p>Kegiatan penelitian selesai dilakukan. Anda dapat melakukan download laporan dan memo Kepala PPPM jika diperlukan</p>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="/penelitian/view-laporan/<?= $penelitian['id_penelitian']; ?>/1" class="btn btn-success">Lihat Laporan </a>
                                <a href="/penelitian/download-memo-penelitian/<?= $penelitian['id_penelitian']; ?>" class="btn btn-warning">Download Memo Kepala PPPM</a>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="/penelitian/download-laporan/<?= $penelitian['id_penelitian']; ?>/2" class="btn btn-primary">Download Laporan </a>
                            </div>
                        </div>
                    </div>
                </div>


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