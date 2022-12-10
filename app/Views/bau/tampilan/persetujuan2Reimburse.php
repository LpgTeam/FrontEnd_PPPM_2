<? //= $this->extend('bau/fixed/templateReimburse') 
?>
<?= $this->extend('fixed/templateReimburse') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Reimbursement PKM <?= $reimburse['jenis_pkm'] ?></h2>
                <hr>
                <p>Bagian Administrasi Umum Politeknik Statistika STIS</p>
            </header>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Reimbursement</h3>
                            <p>
                                Proses pencairan dana reimbursement yang diajukan dosen
                                oleh Bagian Administrasi Umum Politeknik Statistika STIS
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <!-- End Proses -->

            <div class="row" data-aos="fade-up">
                <?php
                if ($reimburse['id_status'] == 1) {
                ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Proposal Reimbursement PKM</h5>
                            <hr>
                            <p>Proposal Reimbursement PKM yang diajukan dosen
                                oleh Direktur Politeknik Statistika STIS
                            </p>
                            <div class="d-flex justify-content-end ms-1">
                                <a href="/pkm/download-memo-pkm/<?= $reimburse['id_pkm']; ?>" class="btn btn-warning">Download Memo Kepala PPPM </a>
                                <div class="d-flex justify-content-end ms-1">
                                    <a href="/pkm/download-laporan/<?= $reimburse['id_pkm']; ?>" class="btn btn-success">Download Formulir Pengajuan</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Pencairan Dana Reimbursement</h5>
                            <hr>
                            <p>Pencairan dana reimbursement yang diajukan dosen
                                oleh Bagian Administrasi Umum Politeknik Statistika STIS
                            </p>

                            <div class="row mb-3">
                                <label for="biayaDiajukan" class="col-md-4 col-lg-3 col-form-label">Biaya yang diajukan :
                                </label>
                                <div class="col-md-8 col-lg-9">
                                    <?php echo 'Rp ',  number_format($dana_pkm, 0, ",", "."); ?>
                                </div>
                            </div>
                            <form action="<?= base_url('/acc-reimbursePKMBAU/' . $reimburse['id_reimburse']); ?>" method="post">
                                <div class="row mb-3">
                                    <label for="biayaDicairkan" class="col-md-4 col-lg-3 col-form-label">Biaya yang
                                        dicairkan :</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="biayaDicairkan" type="number" class="form-control" id="biayaDicairkan">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#submit">Cairkan Dana</button>
                                    </div>
                                </div>
                        </div>
                    <?php
                } else if ($reimburse['id_status'] == 2) {
                    ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Proposal Reimbursement PKM</h5>
                                <hr>
                                <ol>
                                    <li>Topik Kegiatan &nbsp;&nbsp;&nbsp;&nbsp;: <?= $reimburse['judul_pkm']; ?></li>
                                    <li>Jenis PKM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $reimburse['jenis_pkm']; ?></li>
                                    <li>Total Biaya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp <?= number_format($reimburse['biaya_dicairkan'], 0, ",", "."); ?></li>
                                </ol>
                                <div class="d-flex justify-content-end ms-1">
                                    <a href="/pkm/download-memo-pkm/<?= $reimburse['id_pkm']; ?>" class="btn btn-warning">Download Memo Kepala PPPM </a>
                                    <a href="/pkm/download-laporan/<?= $reimburse['id_pkm']; ?>" class="btn btn-success">Download Formulir Pengajuan</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-timeline">
                        <div class="timeline">
                            <a href="#" class="timeline-content">
                                <div class="timeline-icon"><i class="bi bi-bookmark-check"></i></div>
                                <h3 class="title">Dana Reimbursement Sudah Dicairkan</h3>
                            </a>
                        </div>
                            <?php
                        }
                            ?>
                    </div>
    </section>

</main>
<!-- End #main -->
<!-- Submit -->
<!-- <div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="submitLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="submitLabel">Pencairan Dana Reimburse</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan mencairkan dana reimburse proposal ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger"
                    onclick="location.href='/acc-reimbursePKMBAU/<?//= $reimburse['id_reimburse']; ?>'">Ya</button>
            </div>
        </div>
    </div>
</div> -->
<?= $this->endSection(); ?>