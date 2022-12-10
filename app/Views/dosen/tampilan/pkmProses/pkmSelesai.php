<? //= $this->extend('dosen/fixed/templatePKM') 
?>
<?= $this->extend('fixed/templatePKM') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>PKM <?= $pkm['jenis_pkm']; ?> Selesai</h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <p hidden id="statusPKM"><?= $pkm['id_status']; ?></p>
            <p hidden id="jenis"><?= $pkm['jenis_pkm']; ?></p>
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

                    <?php if ($pkm['jenis_pkm'] != 'Mandiri') { ?>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <?php if ($pkm['id_status'] > 2 && !($pkm['id_status'] >= 5 && $pkm['id_status'] <= 6)) { ?>
                                <a href="<?= base_url('pkmProses3') . "/" . $pkm["ID_pkm"]; ?>">
                                    <div class="service-box green">
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
                    <?php } ?>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <?php if (($pkm['id_status'] == 7)) { ?>
                            <a href="<?= base_url('pkmProses4') . "/" . $pkm["ID_pkm"]; ?>">
                                <div class="service-box purple service-box4">
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
                            <h5 class="card-title text-center">Surat Keterangan</h5>
                            <hr>
                            <p>Kegiatan PKM selesai dilakukan. Anda dapat mendownload
                                surat keterangan telah melaksanakan kegiatan PKM dan memo Kepala PPPM </p>
                            <hr>
                            <?= $this->include('proposal/PKM/download_laporan_pkm'); ?>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="/pkm/download-surat-keterangan/<?= $pkm['ID_pkm']; ?>" class="btn btn-primary m-1">Download Surat Keterangan </a>

                            </div>



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

<div id="modal-view" class="modal modal-fullscreen fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full modal-fullscreen mx-auto">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#506396;">
                <h5 class="modal-title" id="modal-title" style="color:white;"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times" style="color:white;"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row holds-the-iframe">
                    <iframe id="iframe-doc" src="/bukti_kegiatan/pkm/Contoh_Proposal_1.pdf" style="width:100%; height: 85vh" class="my-auto"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function klik() {
        file = $("#modal-doc").attr('data-file');
        nama = $("#modal-doc").attr('data-nama');
        $("#iframe-doc").attr("src", "/bukti_kegiatan/pkm/" + file);
        $("#modal-title").html(nama);
        $("#modal-view").modal('show');
    };
</script>

<!-- End #main -->
<?= $this->endSection(); ?>