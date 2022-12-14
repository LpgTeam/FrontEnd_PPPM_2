<? //= $this->extend('kepala/fixed/templatePKM') 
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
            <!-- ======= Proses Section ======= -->
            <p hidden id="statusPKM"><?= $pkm['id_status']; ?></p>
            <p hidden id="jenis"><?= $pkm['jenis_pkm']; ?></p>
            <p hidden id="alasan"><?php if ($pkm['alasan'] == null) {
                                        echo 'kosong';
                                    } else {
                                        echo $pkm['alasan'];
                                    } ?></p>
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <a href="<?= base_url('pkmPersetujuanKepala') . "/" . $pkm["ID_pkm"]; ?>">
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
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <a href="<?= base_url('pkmPersetujuanKepalaSelesai') . "/" . $pkm["ID_pkm"]; ?>">
                            <div class="service-box orange service-box2">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Surat Keterangan</h3>
                                <p>
                                    Proses peninjauan SK PKM yang telah diisi oleh dosen
                                    Politeknik Statistika STIS
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
                            <h5 class="card-title text-center">Laporan</h5>
                            <hr>
                            <p> Laporan kegiatan PKM yang dilakukan oleh Dosen Politeknik Statitika STIS</p>
                            <hr>
                            <?= $this->include('proposal/PKM/download_laporan_pkm'); ?>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Surat Keterangan</h5>
                            <hr>
                            <p>Proses peninjauan SK PKM yang telah diisi dosen
                                Politeknik Statistika STIS oleh Kepala PPPM
                            </p>

                            <?php
                            // var_dump($pkm['id_status']);
                            if ($pkm['id_status'] < 4) { ?>
                                <!-- <div class="d-flex justify"> -->
                                <hr>
                                <h6 class="card-title text-center">Kegiatan PKM belum terlaksana</h6>
                                <!-- </div> -->
                                <?php } else {
                                if ($pkm['id_status'] == 4) { ?>

                                    <div class="d-flex justify-content-end">
                                        <div class="text-end">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tidak">Tidak</button>
                                        </div>
                                        <div class="text-end">
                                            <p>&nbsp&nbsp&nbsp</p>
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#submit">Setuju</button>
                                        </div>
                                    </div>
                                    <?php } else {
                                    if ($pkm['id_status'] >= 5 && $pkm['id_status'] <= 6) { ?>
                                        <hr>
                                        <h6 class="card-title text-center">PKM Tidak Disetujui</h6>
                                    <?php } else { ?>
                                        <hr>
                                        <h6 class="card-title text-center">PKM ini Sudah di Setujui</h6>

                            <?php
                                    }
                                }
                            } ?>
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
<!-- Submit -->
<div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="submitLabel">Setujui Form PKM</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin menyetujui untuk menyelesaikan PKM ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/pkmaccAkhir-kepala/<?= $pkm['ID_pkm']; ?>'">Ya</button>
            </div>
        </div>
    </div>
</div>

<!-- Tidak Setuju -->
<div class="modal fade" id="tidak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tidakLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tidakLabel">Tidak Setujui Form PKM</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="alasan" class="col-form-label">Alasan menolak :</label>
                    <textarea class="form-control" id="alasan" name="alasan"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/pkmrjc-kepala/<?= $pkm['ID_pkm']; ?>'">Selesai</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>