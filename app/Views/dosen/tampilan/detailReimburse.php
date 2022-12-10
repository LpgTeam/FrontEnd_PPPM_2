<? //= $this->extend('direktur/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templateReimburse') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Reimbursement Penelitian <?= $penelitian['jenis_penelitian'] ?></h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Reimbursement</h3>
                            <p>
                                Reimbursement penelitian yang diajukan dosen
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


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Pengajuan Reimbursement Penelitian</h5>
                        <hr>
                        <p>Reimbursement penelitian yang diajukan dosen
                            Politeknik Statistika STIS
                        </p>
                        <hr>
                        <div class="d-flex justify-content-end ms-1">
                            <a href="/penelitian/download-memo-penelitian/<?= $penelitian['id_penelitian']; ?>" class="btn btn-warning m-1">Download Memo Kepala PPPM</a>
                            <a href="/penelitian/view-laporan/<?= $penelitian['id_penelitian']; ?>/1" class="btn btn-success m-1">Lihat Laporan</a>
                        </div>
                        <hr>
                        <?php
                            if ($penelitian['id_status_reimburse'] == 0) {

                        ?>
                            <form action="<?= base_url('/reimburseDetail/savePenelitian/' . $penelitian['id_penelitian']); ?>" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label ">Contoh Letter of Acceptance</label>
                                    <div class="col-md-8 col-lg-9">
                                        <a href="<?= base_url('/reimburseDetail/printContohLoA') ?>" class="btn btn-primary">
                                            Download Contoh
                                        </a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="uploadLoa" class="col-md-4 col-lg-3 col-form-label ">Letter of Acceptance (.pdf)</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="uploadLoa" class="form-control  <?= ($validation->hasError('uploadLoa')) ? 'is-invalid' : ''; ?>" type="file" id="uploadLoa" required>
                                        <div class="invalid-feedback" id="uploadValid">
                                            <?= $validation->getError('uploadLoa'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label ">Contoh Naskah Artikel</label>
                                    <div class="col-md-8 col-lg-9">
                                        <a href="<?= base_url('/reimburseDetail/printContohNaskah') ?>" class="btn btn-primary">
                                            Download Contoh
                                        </a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="uploadNaskah" class="col-md-4 col-lg-3 col-form-label ">Naskah Artikel (.pdf)</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="uploadNaskah" class="form-control <?= ($validation->hasError('uploadNaskah')) ? 'is-invalid' : ''; ?>" type="file" id="uploadNaskah" required>
                                        <div class="invalid-feedback" id="uploadValid">
                                            <?= $validation->getError('uploadNaskah'); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label ">Contoh Bukti Pembayaran (Invoice)</label>
                                    <div class="col-md-8 col-lg-9">
                                        <a href="<?= base_url('/reimburseDetail/printContohInvoice'); ?>" class="btn btn-primary">
                                            Download Contoh
                                        </a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="uploadInvoice" class="col-md-4 col-lg-3 col-form-label ">Bukti Pembayaran (Invoice)(.pdf)</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="uploadInvoice" class="form-control <?= ($validation->hasError('uploadInvoice')) ? 'is-invalid' : ''; ?>" type="file" id="uploadInvoice" required>
                                        <div class="invalid-feedback" id="uploadValid">
                                            <?= $validation->getError('uploadInvoice'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label ">Template Form Usulan Publikasi</label>
                                    <div class="col-md-8 col-lg-9">
                                        <a href="<?= base_url('/reimburseDetail/printFormPublikasi') ?>" class="btn btn-primary">
                                            Download Template
                                        </a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="uploadForm" class="col-md-4 col-lg-3 col-form-label ">Upload Usulan Publikasi(.pdf)</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="uploadForm" class="form-control  <?= ($validation->hasError('uploadForm')) ? 'is-invalid' : ''; ?>" type="file" id="uploadForm" required>
                                        <div class="invalid-feedback" id="uploadValid">
                                            <?= $validation->getError('uploadForm'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="biaya" class="col-md-4 col-lg-3 col-form-label ">Total Biaya</label>
                                    <div class="col-md-8 col-lg-9">
                                    <p>Rp <?= number_format($dana_keluar[0]['dana_keluar'], 0, ",", "."); ?></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#submit">Ajukan Reimbursement </button>
                                </div>
                            </form>



                        <?php
                        } else if ($penelitian['id_status_reimburse'] == 1) {
                        ?>
                            <div class="main-timeline">
                                <div class="timeline">
                                    <a href="#" class="timeline-content">
                                        <div class="timeline-icon"><i class="bi bi-bookmark-check"></i></div>
                                        <h5 class="title">Pengajuan Reimbursement Anda Sedang dalam Proses</h5>
                                    </a>
                                </div>

                        <?php
                        } else if ($penelitian['id_status_reimburse'] == 2) {
                        ?>

                            <div class="main-timeline">
                                <div class="timeline">
                                    <a href="#" class="timeline-content">
                                        <div class="timeline-icon"><i class="bi bi-bookmark-check"></i></div>
                                        <h3 class="title">Dana Reimbursement Anda Sudah Dicairkan</h3>
                                        <p>Untuk informasi lebih lanjut mengenai detail pencairan, silahkan hubungi BAU</p>
                                    </a>
                                </div>
                            <?php
                        }
                            ?>



                            </div>
                    </div>


    </section>

</main>
<!-- End #main -->
<!-- Submit -->
<?= $this->endSection(); ?>