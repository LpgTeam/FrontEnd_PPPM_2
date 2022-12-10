<? //= $this->extend('adminPPPM/fixed/templatePenelitian') 
?>
<?= $this->extend('fixed/templatePenelitian') ?>

<?= $this->section('content'); ?>
<main id="main" class="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <header class="section-header2">
                <h2>Penelitian <?= $penelitian['jenis_penelitian']; ?></h2>
                <hr>
                <p>Dosen Politeknik Statistika STIS</p>
            </header>
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 d-flex justify-content-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <a href="/adminProses1/<?= $penelitian['id_penelitian'] ?>">
                            <div class="service-box blue">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Proposal</h3>
                                <p>
                                    Proses peninjauan dan persetujuan proposal penelitian
                                    yang diajukan oleh dosen
                                </p>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <a href="/adminProses3/<?= $penelitian['id_penelitian'] ?>">
                            <div class="service-box green service-box3">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Laporan</h3>
                                <p>
                                    Pelaporan hasil kegiatan penelitian yang dilakukan oleh dosen
                                </p>
                            </div>
                        </a>
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
                            <h5 class="card-title text-center">Laporan</h5>
                            <hr>
                            <p>Laporan hasil kegiatan penelitian yang dilakukan oleh dosen Politeknik Statistika STIS </p>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="/penelitian/view-laporan/<?= $penelitian['id_penelitian']; ?>/1" class="btn btn-success">Lihat Laporan </a>
                                <a href="/penelitian/download-laporan/<?= $penelitian['id_penelitian']; ?>/2" class="btn btn-primary">Download Laporan </a>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <?php if ($penelitian['jenis_penelitian'] == 'Semi Mandiri') : ?>
                                    <a href="/penelitian/download-memo-penelitian/<?= $penelitian['id_penelitian']; ?>" class="btn btn-warning">Download Memo Kepala PPPM</a>
                                <?php endif; ?>
                                <!-- <a href="/penelitian/download-memo-penelitian/<?= $penelitian['id_penelitian']; ?>" class="btn btn-warning">Download Memo Kepala PPPM</a> -->
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <?php if ($status != null) { ?>
                                <div class="statAdmin">
                                    <table id="example">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="title" colspan="2">Status Penelitian</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                            $i = 1;
                                            foreach ($status as $key => $post) :  ?>

                                                <tr>
                                                    <td style="text-align:center" width="20%" class="icon"><i class="bi bi-check-circle-fill">
                                                        </i>
                                                        <div class="vertical-line"></div>
                                                    </td>
                                                    <td class="stat card">&nbsp; <?php echo $post['status'] ?></td>
                                                </tr>
                                                <?php $i++;    ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <?php if ($i > 2) { ?>
                                    <a href="/removeStatus/<?= $post['id_penelitian']; ?>/<?= $statusTerbaru['id_status']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main>
<!-- End #main -->
<?= $this->endSection(); ?>