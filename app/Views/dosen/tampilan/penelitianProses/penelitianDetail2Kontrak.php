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
                            <h3>Kontrak</h3>
                            <p>
                                Persetujuan kontrak antara pihak Peneliti dengan pihak Politeknik Statistika STIS
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
                            <h5 class="card-title text-center">Kontrak</h5>
                            <hr>
                            <p>Penandatanganan Kontrak Penelitian untuk memberikan kepastian tentang hak dan kewajiban
                                baik bagi dosen/peneliti maupun bagi Polstat STIS.
                            </p>
                            <div class="d-flex justify-content-between">
                                <!-- <button class="btn btn-secondary">Lihat Kontrak </button> -->
                                <a href="<?= base_url('penelitian/printKontrak') ?>" class="btn btn-primary">
                                    Download Kontrak
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body mt-3">
                            <h5 class="card-title text-center">Upload Kontrak</h5>
                            <hr>
                            <?php
                            if ($laporan['kontrak'] == null) {
                            ?>
                                <form action="<?= base_url('/penelitianDetail/saveKontrak/' . $penelitian['id_penelitian']); ?>" method="post" onsubmit="return submitForm(this);" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="uploadKontrak" class="col-md-4 col-lg-3 col-form-label ">Upload</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="uploadKontrak" class="form-control <?= ($validation->hasError('uploadKontrak')) ? 'is-invalid' : ''; ?>" type="file" id="uploadKontrak" aria-describedby="uploadValid">
                                            <div class="invalid-feedback" id="uploadValid">
                                                <?= $validation->getError('uploadKontrak'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">Submit Kontrak</button>
                                        <!-- <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#submit">Submit Kontrak</button> -->
                                    </div>
                                </form><!-- Form End -->
                        </div>
                    <?php
                            } else {
                    ?>

                        <h5 class="card-title text-center">Upload Kontrak</h5>
                        <hr>
                        <p class="text-center">Anda Sudah Upload Kontrak!!</p>

                    <?php
                            }
                    ?>
                    </div>
                </div>
                <script>
                    function submitForm(form) {
                        swal({
                                title: "Are you sure?",
                                text: "This form will be submitted",
                                buttons: true,
                            })
                            .then(function(isOkay) {
                                if (isOkay) {
                                    form.submit();
                                }
                            });
                        return false;
                    }
                </script>

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



        </div>
    </section>

</main>
<!-- End #main -->
Submit
<div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="submitLabel">Setuju Kontrak Penlitian</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin menyetujui kontrak penelitian?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/penelitianDosen'">Ya</button>
            </div>
        </div>
    </div>
</div>

<!-- Tidak Setuju -->
<div class="modal fade" id="tidak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tidakLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tidakLabel">Tidak Setujui Kontrak</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apak anda yakin tidak ingin menyetujui kontrak?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="location.href='/penelitianDosen'">Ya</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>