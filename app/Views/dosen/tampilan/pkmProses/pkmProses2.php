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
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue ">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Form</h3>
                            <p>
                                Proses peninjauan form PKM yang telah diisi oleh dosen
                                Politeknik Statistika STIS
                            </p>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-box green service-box3">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Laporan</h3>
                            <p>
                                Pelaporan kegiatan PKM yang dilakukan oleh dosen
                                Politeknik Statistika STIS
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-box purple">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Selesai</h3>
                            <p>
                                Proses PKM selesai dilaksanakan oleh dosen
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
                            <h5 class="card-title text-center">Upload Surat Pernyataan</h5>
                            <hr>
                            <p>Surat pernyataan PKM Dosen Politeknik Statistika STIS</p>
                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url('pkm/printSurat') ?>" class="btn btn-primary">
                                    Download Surat Pernyataan
                                </a>
                            </div>
                            <hr>
                            <?php
                            // var_dump($rincian);
                            if ($rincian['surat_pernyataan'] == null) {
                            ?>
                                <form action="<?= base_url('/pkmDetail/saveSurat/' . $pkm['ID_pkm']); ?>" method="post" onsubmit="return submitForm(this);" enctype="multipart/form-data">
                                    <div class="d-flex justify-content-between">
                                        <div class="row mb-4">
                                            <label for="uploadPendanaan" class="col-md-4 col-lg-3 col-form-label ">Surat Pernyataan</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input id="suratPernyataan" name="suratPernyataan" class="form-control <?= ($validation->hasError('suratPernyataan')) ? 'is-invalid' : ''; ?>" type="file" aria-describedby="uploadValid">
                                                <div class="invalid-feedback" id="uploadValid">
                                                    <?= $validation->getError('suratPernyataan'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            <?php
                            } else {
                            ?>
                                <!-- <h5 class="card-title text-center">Surat Pernyataan</h5>
                                <hr> -->
                                <h6 class="card-title text-center">Anda Sudah Upload Surat Pernyataan!!</h6>
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

    <script>
        function submitForm(form) {
            swal({
                    title: "Apakah Anda Yakin?",
                    text: "Dokumen ini akan di upload",
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
</main>
<!-- End #main -->

<?= $this->endSection(); ?>