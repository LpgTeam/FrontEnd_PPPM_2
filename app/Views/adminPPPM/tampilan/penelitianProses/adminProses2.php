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
                        <a href="/adminProses1/<?= $penelitian['id_penelitian']?>">
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

                    <!-- Di danai Institusi & institusi -->
                    <?php if ($penelitian['jenis_penelitian'] == 'Di Danai Institusi' || $penelitian['jenis_penelitian'] == 'Institusi') { ?>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <a href="/adminProses2/<?= $penelitian['id_penelitian']?>">
                                <div class="service-box orange service-box2">
                                    <i class="ri-discuss-line icon"></i>
                                    <h3>Kontrak</h3>
                                    <p>
                                        Persetujuan kontrak antara pihak Peneliti dengan pihak Politeknik Statistika STIS
                                    </p>
                                </div>
                            </a>
                        </div>

                    <?php } else if ($penelitian['jenis_penelitian'] == 'Semi Mandiri') { ?>
                        <!-- Semi Mandiri                     -->
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <a href="/adminProses3/<?= $penelitian['id_penelitian']?>">
                                <div class="service-box orange service-box2">
                                    <i class="ri-discuss-line icon"></i>
                                    <h3>Pendanaan</h3>
                                    <p>
                                        Pendanaan untuk kegiatan publikasi dari penelitian yang
                                        dilakukan oleh dosen
                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <a href="">
                            <div class="service-box green">
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
                <!-- didanai institusi &institusi -->
                <?php if ($penelitian['jenis_penelitian'] == 'Di Danai Institusi' || $penelitian['jenis_penelitian'] == 'Institusi') { ?>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Kontrak Penelitian</h5>
                                <hr>
                                <p>Persetujuan kontrak penelitian yang dilakukan antara pihak Peneliti
                                    yaitu dosen dengan pihak Politeknik Statistika STIS</p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-success">Lihat Kontrak Penelitian </button>
                                    <button class="btn btn-primary">Download Kontrak Penelitian </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- semi mandiri -->
                <?php } else if ($penelitian['jenis_penelitian'] == 'Semi Mandiri') { ?>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Bukti Pendanaan</h5>
                                <hr>
                                <p>Pendanaan yang dikeluarkan oleh dosen pada saat melakukan publikasi
                                    hasil penelitian yang dilakukan oleh dosen Politeknik Statistika STIS </p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-success">Lihat Bukti Pendanaan </button>
                                    <button class="btn btn-primary">Download Bukti Pendanaan </button>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>

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