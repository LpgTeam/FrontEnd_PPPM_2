<? //= $this->extend('dosen/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templatePenelitian') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert" data-aos="zoom-in">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert" data-aos="zoom-in">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <header class="section-header2">
                <h2>Penelitian <?= $penelitian['jenis_penelitian']; ?></h2>
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
                        <div class="service-box blue">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Proposal</h3>
                            <p>
                                Proses peninjauan dan persetujuan proposal penelitian
                                yang diajukan oleh dosen
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-box orange service-box2">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Pendanaan</h3>
                            <p>
                                Pendanaan untuk kegiatan publikasi dari penelitian yang
                                dilakukan oleh dosen
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-box green">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Laporan</h3>
                            <p>
                                Pelaporan hasil kegiatan penelitian yang dilakukan oleh dosen
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-box purple">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Selesai</h3>
                            <p>
                                Proses penelitian selesai dilaksanakan oleh dosen
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
                            <h5 class="card-title text-center">Pendanaan</h5>
                            <hr>
                            <p>Melampirkan bukti pendanaan untuk kegiatan publikasi hasil dari penelitian</p>
                            <hr>
                            <?php
                            if ($laporan['laporan_dana'] == null) {
                            ?>
                                <form action="<?= base_url('/penelitianDetail/savePendanaan/' . $penelitian['id_penelitian']); ?>" method="post" onsubmit="confirm('Apakah Anda Setuju')" enctype="multipart/form-data">
                                    <div class="d-flex justify-content-between">
                                        <div class="row mb-4">
                                            <label for="uploadPendanaan" class="col-md-4 col-lg-3 col-form-label ">Upload</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="uploadPendanaan" class="form-control <?= ($validation->hasError('uploadPendanaan')) ? 'is-invalid' : ''; ?>" type="file" id="uploadPendanaan" aria-describedby="uploadValid">
                                                <div class="invalid-feedback" id="uploadValid">
                                                    <?= $validation->getError('uploadPendanaan'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success">Submit Bukti </button>
                                    </div>
                                </form>
                            <?php
                            } else {
                            ?>
                                <h5 class="card-title text-center">Upload Pendanaan</h5>
                                <hr>
                                <p class="text-center">Anda Sudah Upload Pendanaan!!</p>
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