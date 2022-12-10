<? //= $this->extend('adminPPPM/fixed/templatePKM') 
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
            <!-- ======= Proses Section ======= -->
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 d-flex justify-content-center">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <a href="/adminPkmProses1/<?= $pkm['ID_pkm'] ?>">
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
                        <a href="/adminPkmProses2/<?= $pkm['ID_pkm'] ?>">
                            <div class="service-box green service-box3">
                                <i class="ri-discuss-line icon"></i>
                                <h3>Laporan</h3>
                                <p>
                                    Pelaporan kegiatan PKM yang dilakukan oleh dosen
                                    Politeknik Statistika STIS
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
                            <h5 class="card-title text-center">Bukti Kegiatan</h5>
                            <hr>
                            <p>Berisi bukti-bukti dari kegiatan PKM yang telah dilaksanakan oleh Dosen
                                Politeknik Statistika STIS
                            </p>
                            <div class="d-flex justify-content-between">
                                <?= $this->include('proposal/PKM/download_laporan_pkm'); ?>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="statAdmin">
                                <?php if ($status != null) { ?>
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
                                                    <td class="stat card">&nbsp;<?php echo $post['status'] ?></td>
                                                    <!-- <td>
                                                <a href="/removeStatus/<? //= $post['id_status']; 
                                                                        ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            </td> -->
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <br>
                            </div>
                            <?php if ($i > 2) { ?>
                                <a href="/removeStatusPkm/<?= $post['id_pkm']; ?>/<?= $statusTerbaru['id_status']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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