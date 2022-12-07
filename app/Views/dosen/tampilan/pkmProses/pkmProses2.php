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
                <div class="row gy-4 justify-content-md-center">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <a href="<?= base_url('pkmProses1') . "/" . $pkm["ID_pkm"]; ?>">
                            <div class="service-box blue ">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Form</h3>
                                <p>
                                    Proses peninjauan form PKM yang telah diisi oleh dosen
                                    Politeknik Statistika STIS
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <?php if ($pkm['id_status'] > 2 && !($pkm['id_status'] >= 5 && $pkm['id_status'] <= 6)) { ?>
                            <a href="<?= base_url('pkmProses2') . "/" . $pkm["ID_pkm"]; ?>">
                                <div class="service-box green service-box3">
                                <?php } else { ?>
                                    <div class="service-box secondary">
                                    <?php }  ?>

                                    <i class="ri-discuss-line icon"></i>
                                    <h3>Laporan</h3>
                                    <p>
                                        Pelaporan kegiatan PKM yang dilakukan oleh dosen
                                        Politeknik Statistika STIS
                                    </p>
                                    </div>
                                    <?php if ($pkm['id_status'] > 2 && !($pkm['id_status'] >= 5 && $pkm['id_status'] <= 6)) { ?>
                            </a>
                        <?php } ?>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <?php if (($pkm['id_status'] == 7)) { ?>
                            <a href="<?= base_url('pkmProses4') . "/" . $pkm["ID_pkm"]; ?>">
                                <div class="service-box purple">
                                <?php } else { ?>
                                    <div class="service-box secondary">
                                    <?php }  ?>
                                    <i class="ri-discuss-line icon"></i>
                                    <h3>Selesai</h3>
                                    <p>
                                        Proses PKM selesai dilaksanakan oleh dosen
                                        Politeknik Statistika STIS
                                    </p>
                                    </div>
                                    <?php if ($pkm['id_status'] == 7) { ?>
                            </a>
                        <?php } ?>
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
                            // var_dump($pkm['id_status'] );
                            if ($pkm['id_status'] < 4) {
                                if (($ttd['ttd_manual'] == null && $ttd['ttd_digital'] == null)) {
                            ?>
                                    <div class="text-center">
                                        <h6>Anda belum upload tanda tangan di halaman Beranda, upload terlebih dahulu!</h6>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <!-- <form action="<?= base_url('/pkmDetail/saveSurat/' . $pkm['ID_pkm']); ?>" method="post" onsubmit="return submitForm(this);" enctype="multipart/form-data">
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
                                    <div class="row mb-4">
                                        <label for="totalDana" class="col-md-4 col-lg-3 col-form-label">Total dana</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="totalDana" type="text" class="form-control" id="totalDana">
                                        </div>
                                    </div>
                                    </div> 
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form> -->
                                    <div>
                                        dengan menyetujui artinya anda setuju dengan seluruh pernyataan yang ada di
                                        surat pernyataan dan tanda tangan anda akan otomatis tergenerate ke surat pernyataan
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#submit">Setuju</button>
                                    </div>
                                <?php }
                            } else { ?>
                                <!-- <h5 class="card-title text-center">Surat Pernyataan</h5>
                                <hr> -->
                                <h6 class="card-title text-center">Anda Sudah Menyetujui Surat Pernyataan!!</h6>
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
    <!-- Setujui modal -->
    <div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="submitLabel">Setujui Surat Pernyataan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin menyetujui Surat Pernyataan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" onclick="location.href='/pkm/setujuiSurat/<?= $pkm['ID_pkm'] ?>'">Ya</button>
                </div>
            </div>
        </div>
    </div>
    <!-- endModal -->

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