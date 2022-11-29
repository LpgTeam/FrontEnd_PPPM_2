<? //= $this->extend('dosen/fixed/templatePKM') 
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
                            <h5 class="card-title text-center">Surat Pernyataan</h5>
                            <hr>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a
                                type specimen book. It has survived not only five centuries, but also the
                                leap into electronic typesetting, remaining essentially unchanged. It was
                                popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            </p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-secondary">Lihat Surat </button>
                                <a href="<?= base_url('pkm/printSurat') ?>" class="btn btn-primary">
                                    Download Surat Pernyataan
                                </a>
                            </div>
                            <hr>

                            <form action="<?= base_url('/pkmDetail/saveSurat/' . $pkm['ID_pkm']); ?>" method="post" enctype="multipart/form-data">
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
                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </form>
                            <!-- <form>
                                <div class="row mb-4">
                                    <label for="suratPernyataan" class="col-md-3 col-lg-4 col-form-label ">Surat Pernyataan</label>
                                    <div class="col-md-3 col-lg-8">
                                        <input class="form-control" type="file" id="suratPernyataan" name="suratPernyataan" required>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form> -->
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





<?= $this->endSection(); ?>