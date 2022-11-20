<?= $this->extend('dosen/fixed/templatePenelitian') ?>

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
                                Pelaporan hasil kegiatan penelitain yang dilakukan oleh dosen
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
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a
                                type specimen book. It has survived not only five centuries, but also the
                                leap into electronic typesetting, remaining essentially unchanged. It was
                                popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            </p>
                            <div class="d-flex justify-content-between">
                                <!-- <button class="btn btn-secondary">Lihat Kontrak </button> -->
                                <a href="<?= base_url('penelitian/printpdfKontrak') ?>" class="btn btn-primary">
                                    Download Kontrak
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($laporan['kontrak'] == null) {
                    ?>
                        <div class="card-body mt-3">
                            <h5 class="card-title text-center">Upload Kontrak</h5>
                            <hr>
                            <form action="<?= base_url('/penelitianDetail/saveKontrak/' . $penelitian['id_penelitian']); ?>" method="post" onsubmit="confirm('Apakah Anda Setuju')" enctype="multipart/form-data">
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
                </div>
            <?php
                    } else {
            ?>
                <div class="card">
                    <div class="card-body mt-3">
                        <h5 class="card-title text-center">Upload Kontrak</h5>
                        <hr>
                        <h5 class="text-center">Anda Sudah Upload Kontrak!!</h5>
                    </div>
                </div>
            <?php
                    }
            ?>
            </div>

            <!-- <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Perjanjian Kontak Penelitan</h5>
                            <hr>

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
                        </div>
                    </div> -->


            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- End #main -->
<!-- Submit -->
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