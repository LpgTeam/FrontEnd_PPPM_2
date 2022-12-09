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

            <p hidden id="statusPKM"><?= $pkm['id_status']; ?></p>
            <p hidden id="alasan"><?php if ($pkm['alasan'] == null) {
                                        echo 'kosong';
                                    } else {
                                        echo $pkm['alasan'];
                                    } ?></p>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Form</h3>
                            <p>
                                Proses peninjauan form PKM yang telah diisi oleh dosen
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
                            <div class="d-flex justify-content-between">
                                <!-- <button class="btn btn-secondary">Lihat Form </button> -->
                                <!-- <a href="/pkm/download-proposal/<?= $pkm['ID_pkm']; ?>" class="btn btn-primary">Download Form </a> -->
                                <?= $this->include('proposal/PKM/download_form_pkm'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Persetujuan Form</h5>
                            <hr>
                            <?php
                            // var_dump($pkm['id_status']);
                            if ($pkm['id_status'] < 2) { ?>
                                <hr>
                                <h6 class="card-title text-center">Menunggu Persetujuan Kepala PPPM</h6>
                                <?php } else {
                                if ($pkm['id_status'] == 2) { ?>
                                    <p>Persetujuan formulir PKM yang diajukan dosen
                                        oleh BAU
                                    </p>
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
                                        <h6 class="card-title text-center">Kegiatan PKM Sudah Disetujui</h6>
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
                Apakah anda yakin menyetujui form PKM ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/pkmacc-BAU/<?= $pkm['ID_pkm']; ?>'">Ya</button>
            </div>
        </div>
    </div>
</div>

<!-- Tidak Setuju -->
<form action="<?= base_url('/pkmrjc-BAU/' . $pkm['ID_pkm']) ?>">
    <div class="modal fade" id="tidak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tidakLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tidakLabel">Tidak Setujui Proposal</h1>
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
                    <!-- <button type="button" class="btn btn-primary" onclick="location.href='/rjc-BAU/<//?= $pkm['id_pkm']; ?>'">Selesai</button> -->
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>