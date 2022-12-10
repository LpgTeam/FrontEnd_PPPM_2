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
                            <div class="service-box blue service-box1">
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
                            <div class="service-box green">
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
                            <h5 class="card-title text-center">Form</h5>
                            <hr>
                            <ol>
                                <li>Topik PKM &nbsp;&nbsp;&nbsp;&nbsp;: <?= $pkm['topik_kegiatan']; ?></li>
                                <li>Jenis PKM &nbsp;&nbsp;&nbsp;&nbsp; : <?= $pkm['jenis_pkm']; ?></li>
                            </ol>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <?= $this->include('proposal/PKM/download_form_pkm'); ?>
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
                                <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#submit"><i class="bi bi-trash"></i></a>
                        <?php }
                                } ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- modal -->
    <div class="modal fade" id="submit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submitLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="submitLabel">Undo Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan undo status PKM?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" onclick="location.href='/removeStatusPkm/<?= $post['id_pkm']; ?>/<?= $statusTerbaru['id_status']; ?>'">Ya</button>
                </div>
            </div>
        </div>
        <!-- END modal -->

</main>
<!-- End #main -->
<?= $this->endSection(); ?>