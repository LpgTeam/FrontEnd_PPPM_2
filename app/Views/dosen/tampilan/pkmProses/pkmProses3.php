<? //= $this->extend('dosen/fixed/templatePKM') 
?>
<?= $this->extend('fixed/templatePKM') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert" data-aos="zoom-in">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <header class="section-header2">
                <h2>PKM <?= $pkm['jenis_pkm'] ?></h2>
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
                        <a href="<?= base_url('pkmProses1') . "/" . $pkm["ID_pkm"]; ?>">
                            <div class="service-box blue">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Form</h3>
                                <p>
                                    Proses peninjauan form PKM yang telah diisi oleh dosen
                                    Politeknik Statistika STIS
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <?php if ($pkm['id_status'] > 2 && !($pkm['id_status'] >= 5 && $pkm['id_status'] <= 6)) { ?>
                            <a href="<?= base_url('pkmProses3') . "/" . $pkm["ID_pkm"]; ?>">
                                <div class="service-box green service-box3">
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

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <?php if (($pkm['id_status'] == 7)) { ?>
                            <a href="<?= base_url('pkmProses4') . "/" . $pkm["ID_pkm"]; ?>">
                                <div class="service-box purple ">
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
                            <h5 class="card-title text-center">Upload Bukti Kegiatan dan Tugas/Peran Tim PKM</h5>
                            <hr>
                            <p>
                                Hal yang perlu disertakan dalam bukti kegiatan
                            <ul>
                                <li>
                                    Slide paparan/artikel/dokumen/bukti lain
                                </li>
                                <li>
                                    Presensi peserta
                                </li>
                                <li>
                                    Dokumentasi
                                </li>
                                <li>
                                    Feedback (sampel) peserta
                                </li>
                                <li>
                                    Penggunaan dana
                                </li>
                                <li>
                                    Dijadikan di 1 file PDF
                                </li>
                            </ul>
                            </p>
                            <hr>
                            <?php
                            // var_dump($rincian);
                            if ($rincian['bukti_kegiatan'] == null) {
                            ?>
                                <form action="<?= base_url('/pkmDetail/saveBukti/' . $pkm['ID_pkm']); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row mb-4">
                                        <label for="bukti" class="col-md-3 col-lg-4 col-form-label ">Bukti Kegiatan</label>
                                        <div class="col-md-3 col-lg-8">
                                            <input class="form-control <?= ($validation->hasError('uploadBukti')) ? 'is-invalid' : ''; ?>" type="file" id="uplodBukti" name="uploadBukti">
                                            <div class="invalid-feedback" id="uploadValid">
                                                <?= $validation->getError('uploadBukti'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row ">
                                        <label for="bukti" class="col-md-3 col-lg-4 col-form-label ">Narasumber Kegiatan</label>
                                        <div class="col-md-3 col-lg-8">
                                            <input class="form-control" type="text" id="narasumber" name="narasumber" required>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <label for="bukti" class="col-md-3 col-lg-4 col-form-label ">Penyelenggara Kegiatan</label>
                                        <div class="col-md-3 col-lg-8">
                                            <input class="form-control" type="text" id="penyelenggara" name="penyelenggara" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-4">
                                        <label for="totalDana" class="col-md-3 col-lg-4 col-form-label">Total dana</label>
                                        <div class="col-md-3 col-lg-8">
                                            <input name="totalDana" type="text" class="form-control" id="totalDana">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-8">&nbsp</div>


                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            <?php
                            } else {
                            ?>
                                <!-- <h5 class="card-title text-center">Bukti Kegiatan</h5> -->
                                <!-- <hr> -->
                                <h6 class="card-title text-center">Anda Sudah Upload Bukti Kegiatan!!</h6>
                            <?php
                            }
                            ?>
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