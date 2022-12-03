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
            <p hidden id="status"><?= $penelitian['id_status']; ?></p>
            <p hidden id="jenis"><?= $penelitian['jenis_penelitian']; ?></p>
            <p hidden id="alasan"><?php if ($penelitian['alasan'] == null) {
                                        echo 'kosong';
                                    } else {
                                        echo $penelitian['alasan'];
                                    } ?></p>
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 d-flex justify-content-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue service-box1">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Proposal</h3>
                            <p>
                                Proses peninjauan dan persetujuan proposal penelitian
                                yang diajukan oleh dosen
                            </p>
                        </div>
                    </div>
                    <!-- Di danai Institusi & institusi -->
                    <?php if ($penelitian['jenis_penelitian'] == 'Di Danai Institusi' || $penelitian['jenis_penelitian'] == 'Institusi') { ?>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="service-box orange">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Kontrak</h3>
                                <p>
                                    Persetujuan kontrak antara pihak Peneliti dengan pihak Politeknik Statistika STIS
                                </p>
                            </div>
                        </div>

                    <?php } else if ($penelitian['jenis_penelitian'] == 'Semi Mandiri') { ?>
                        <!-- Semi Mandiri                     -->
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="service-box orange">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Pendanaan</h3>
                                <p>
                                    Pendanaan untuk kegiatan publikasi dari penelitian yang
                                    dilakukan oleh dosen
                                </p>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-box green">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Laporan</h3>
                            <p>
                                Pelaporan hasil kegiatan penelitian yang dilakukan oleh dosen
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
                            <h5 class="card-title text-center">Proposal</h5>
                            <hr>
                            <ol>
                                <li>Judul Proposal &nbsp;&nbsp;&nbsp;&nbsp;: <?= $penelitian['judul_penelitian']; ?></li>
                                <li>Jenis Penelitian &nbsp;&nbsp; : <?= $penelitian['jenis_penelitian']; ?></li>
                            </ol>
                            <hr>
                            <hr>
                            <?= $this->include('proposal/download_per_proposal'); ?>

                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <?php if ($status != null) { ?>
                                <table id="example" class="table">
                                    <thead>
                                        <tr class="table-primary">
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                        $i = 1;
                                        foreach ($status as $key => $post) :  ?>

                                            <tr>
                                                <td><?php echo $post['status'] ?></td>

                                            </tr>
                                            <?php $i++;    ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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