<? //= $this->extend('bau/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templatePenelitian') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Penelitian <?= $penelitian['jenis_penelitian'] ?></h2>
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
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Proposal</h3>
                            <p>
                                Proses peninjauan dan persetujuan proposal penelitian
                                yang diajukan oleh dosen
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
                            <h5 class="card-title text-center">Proposal</h5>
                            <hr>
                            <ol>
                                <li>Judul Proposal &nbsp;&nbsp;&nbsp;&nbsp;: <?= $penelitian['judul_penelitian']; ?></li>
                                <li>Jenis Penelitian &nbsp;&nbsp; : <?= $penelitian['jenis_penelitian']; ?></li>
                            </ol>
                            <hr>
                            <?= $this->include('proposal/download_per_proposal'); ?>
                        </div>
                    </div>
                    <?php
                    // var_dump($penelitian['jenis_penelitian'] != 'Mandiri');
                    if (!($penelitian['jenis_penelitian'] == 'Mandiri' || $penelitian['jenis_penelitian'] == 'Kerjasama')) { ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Persetujuan Proposal</h5>
                                <hr>
                                <p>Persetujuan proposal penelitian yang diajukan dosen
                                    oleh reviewer
                                </p>
                                <?php if ($penelitian['id_status'] < 2) { ?>
                                    <hr>
                                    <h6 class="card-title text-center">Menunggu Persetujuan dari Reviewer</h6>
                                    <?php } else {
                                    if ($penelitian['id_status'] == 2) { ?>
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
                                        if ($penelitian['id_status'] >= 7 && $penelitian['id_status'] <= 9) { ?>
                                            <hr>
                                            <h6 class="card-title text-center">Penelitian Tidak Disetujui</h6>
                                        <?php } else { ?>
                                            <hr>
                                            <h6 class="card-title text-center">Penelitian Sudah Disetujui</h6>
                                <?php
                                        }
                                    }
                                } ?>
                            </div>
                        </div>
                    <?php } ?>
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
<!-- Submit -->
<div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="submitLabel">Setujui Proposal Penelitian</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin menyetujui proposal penelitian ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/acc-BAU/<?= $penelitian['id_penelitian']; ?>'">Ya</button>
            </div>
        </div>
    </div>
</div>

<!-- Tidak Setuju -->
<form action="<?= base_url('/rjc-BAU/' . $penelitian['id_penelitian']) ?>">
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
                    <!-- <button type="button" class="btn btn-primary" onclick="location.href='/rjc-BAU/<//?= $penelitian['id_penelitian']; ?>'">Selesai</button> -->
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>