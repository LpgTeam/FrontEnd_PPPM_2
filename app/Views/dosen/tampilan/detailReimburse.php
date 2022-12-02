<? //= $this->extend('direktur/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templateReimburse') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>REIMBURSEMEN</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Reimbursemen</h3>
                            <p>
                                Reimbursemen penlitian yang diajukan oleh dosen
                                oleh Direktur Politeknik Statistika STIS
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
                        <h5 class="card-title text-center">Proposal Reimbursemen Penelitian</h5>
                        <hr>
                        <p>Proposal reimburse penelitian yang diajukan dosen
                            oleh Direktur Politeknik Statistika STIS
                        </p>

                        <hr>

                        <div class="d-flex justify-content-end">
                            <a href="/penelitian/view_proposal/<?= $penelitian['id_penelitian']; ?>/<?= $penelitian['judul_penelitian']; ?>" class="btn btn-secondary">Lihat Proposal </a>
                        </div>
                        <hr>
                        <?php

                        if ($penelitian['id_status_reimburse'] == 0) {
                            if ($kegiatan == 'penelitian') {
                        ?>
                                <form action="<?= base_url('/reimburseDetail/savePenelitian/' . $penelitian['id_penelitian']); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="loa" class="col-md-4 col-lg-3 col-form-label ">Letter of Acceptance (LOA)</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="uploadLoa" class="form-control  <?= ($validation->hasError('uploadLoa')) ? 'is-invalid' : ''; ?>" type="file" id="uploadLoa">
                                            <div class="invalid-feedback" id="uploadValid">
                                                <?= $validation->getError('uploadLoa'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="upload" class="col-md-4 col-lg-3 col-form-label ">Naskah Artikel</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="uploadNaskah" class="form-control <?= ($validation->hasError('uploadNaskah')) ? 'is-invalid' : ''; ?>" type="file" id="uploadNaskah">
                                            <div class="invalid-feedback" id="uploadValid">
                                                <?= $validation->getError('uploadNaskah'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="upload" class="col-md-4 col-lg-3 col-form-label ">Bukti Pembayaran (invoice)</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="uploadInvoice" class="form-control <?= ($validation->hasError('uploadInvoice')) ? 'is-invalid' : ''; ?>" type="file" id="uploadInvoice">
                                            <div class="invalid-feedback" id="uploadValid">
                                                <?= $validation->getError('uploadInvoice'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#submit">Ajukan Reimburse </button>

                                    </div>

                                    <!-- <div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="submitLabel">Submit Pengajuan Reimburse</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin mengajukan reimburse
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                <a button type="submit" class="btn btn-primary" onclick="location.href='<?= base_url('/reimburseDetail/save/' . $penelitian['id_penelitian']); ?>">Ya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                </form>

                            <?php
                            } else  if ($kegiatan == 'pkm') {
                            ?>
                                <form action="<?= base_url('/reimburseDetail/savePkm/' . $pkm['ID_pkm']); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="loa" class="col-md-4 col-lg-3 col-form-label ">Letter of Acceptance (LOA)</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="uploadLoa" class="form-control  <?= ($validation->hasError('uploadLoa')) ? 'is-invalid' : ''; ?>" type="file" id="uploadLoa">
                                            <div class="invalid-feedback" id="uploadValid">
                                                <?= $validation->getError('uploadLoa'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="upload" class="col-md-4 col-lg-3 col-form-label ">Naskah Artikel</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="uploadNaskah" class="form-control <?= ($validation->hasError('uploadNaskah')) ? 'is-invalid' : ''; ?>" type="file" id="uploadNaskah">
                                            <div class="invalid-feedback" id="uploadValid">
                                                <?= $validation->getError('uploadNaskah'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="upload" class="col-md-4 col-lg-3 col-form-label ">Bukti Pembayaran (invoice)</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="uploadInvoice" class="form-control <?= ($validation->hasError('uploadInvoice')) ? 'is-invalid' : ''; ?>" type="file" id="uploadInvoice">
                                            <div class="invalid-feedback" id="uploadValid">
                                                <?= $validation->getError('uploadInvoice'); ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#submit">Ajukan Reimburse </a>

                                    </div>

                                    <!-- <div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="submitLabel">Submit Pengajuan Reimburse</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin mengajukan reimburse
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-primary" onclick="location.href='<?= base_url('/reimburseDetail/savePenelitian/' . $penelitian['id_penelitian']); ?>'">Ya</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                </form>
                            <?php
                            }
                        } else if ($penelitian['id_status_reimburse'] == 1) {
                            ?>
                            <div class="main-timeline">
                                <div class="timeline">
                                    <a href="#" class="timeline-content">
                                        <div class="timeline-year">Dana</div>
                                        <div class="timeline-icon"><i class="bi bi-hourglass-split"></i></div>
                                        <h3 class="title">Pengajuan Reimburse Anda Sedang dalam Proses</h3>
                                    </a>
                                </div>
                            </div>
                        <?php
                        } else if ($penelitian['id_status_reimburse'] == 2) {
                        ?>

                            <div class="main-timeline">
                                <div class="timeline">
                                    <a href="#" class="timeline-content">
                                        <div class="timeline-year">Dana</div>
                                        <div class="timeline-icon"><i class="bi bi-bookmark-check"></i></div>
                                        <h3 class="title">Dana Reimburse Anda Sudah Dicairkan</h3>
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